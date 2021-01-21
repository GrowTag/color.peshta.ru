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
?>
<div class="info-collapse-list">
    <?if($arParams["DISPLAY_TOP_PAGER"]):?>
        <?=$arResult["NAV_STRING"]?><br />
    <?endif;?>
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="card" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="card-header" id="heading_<?=$this->GetEditAreaId($arItem['ID']);?>">
                <h5 class="mb-0">
                    <button class="btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse_<?=$this->GetEditAreaId($arItem['ID']);?>" aria-expanded="true" aria-controls="collapse_<?=$this->GetEditAreaId($arItem['ID']);?>">
                        <?echo $arItem["NAME"]?>
                    </button>
                </h5>
            </div>

            <div id="collapse_<?=$this->GetEditAreaId($arItem['ID']);?>" class="collapse" aria-labelledby="heading_<?=$this->GetEditAreaId($arItem['ID']);?>" data-parent="#<?=$this->GetEditAreaId($arItem['ID']);?>">
                <div class="card-body">
                    <?echo $arItem["PREVIEW_TEXT"];?>
                </div>
            </div>
        </div>
    <?endforeach;?>
</div>
