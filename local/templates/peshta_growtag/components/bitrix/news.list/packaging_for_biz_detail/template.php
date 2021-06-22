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
<div class="packaging-for-biz-slider row align-items-center justify-content-center">
    <?foreach($arResult["ITEMS"] as $key=>$arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <?foreach($arItem["PROPERTIES"]["FOR_BIZ"]["VALUE"] as $item):?>
        <?if($item == $arParams["ELEMENT"]):?>
            <div class="packaging-for-biz-slider__item col-md-4 col-12">
                <img class="packaging-for-biz-slider__item-img" src="<?=CFile::getPath($arItem["PROPERTIES"]["IMAGE"]["VALUE"])?>" alt="<?echo $arItem["NAME"]?>">
                <div class="packaging-for-biz-slider__item-title">
                    <?echo $arItem["NAME"]?>
                </div>
                <div class="packaging-for-biz-slider__item-text">
                    <?=$arItem["PREVIEW_TEXT"];?>
                </div>
            </div>
        <?endif;?>
        <?endforeach;?>
    <?endforeach;?>
</div>