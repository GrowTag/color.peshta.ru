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
<div class="order-list">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

	//var_dump($arItem);
	?>
    <?if($USER->GetID() == $arItem["PROPERTIES"]["USER"]["VALUE"]):?>
	<div class="order-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="order-item__title col-12">
            <span class="order-item-name">№<?echo $arItem["ID"]?> - <?echo $arItem["NAME"]?></span>
            <span class="order-item-date-time"><?=$arItem["DATE_CREATE"]?></span>
        </div>
        <div class="order-item__content col-12">
            <?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
                    <?if(is_array($arProperty["DISPLAY_VALUE"])):?>
                        <?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
                    <?else:?>
                        <?=$arProperty["DISPLAY_VALUE"];?>
                    <?endif?>
                <br />
            <?endforeach;?>
        </div>
	</div>
    <?$count++;?>
    <?endif;?>
<?endforeach;?>
    <?if($count < 1):?>
        <p style="text-align: center;width: 100%;">У вас пока нет заказов</p>
    <?endif;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
