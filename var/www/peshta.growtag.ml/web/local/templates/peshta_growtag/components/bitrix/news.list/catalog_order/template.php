<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$count = 0;
?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
<div class="row modal-order-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
    <div class="col-md-4 col-sm-12 modal-order-item-title">
        <?=$arItem["NAME"]?>:
    </div>
    <div class="col-md-8 col-sm-12 modal-order-item-props">
        <?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
            <?foreach ($arProperty["DISPLAY_VALUE"] as $prop):?>
                <?
                $count++;
                $arProp = explode("|", $prop);
                ?>
                <div class="form-check">
                    <input data-price="<?=$arProp[1];?>" <?if(isset($arProp[2]) && $arProp[2] == "*"):?>data-onlyprice="<?=$arProp[2];?>"<?endif;?> <?if(isset($arProp[3])):?>data-oneprice="<?=$arProp[3];?>"<?endif;?> class="form-check-input" type="radio" name="PROPS[<?=$arItem['ID'];?>]" id="props_<?=$count;?>_<?=$arItem['ID'];?>" value="<?=$arItem["NAME"]?> - <?=$arProp[0];?>">
                    <label class="form-check-label" for="props_<?=$count;?>_<?=$arItem['ID'];?>">
                        <?=$arProp[0];?>
                    </label>
                </div>
            <?endforeach;?>
        <?endforeach;?>
    </div>
</div>
<?endforeach;?>
