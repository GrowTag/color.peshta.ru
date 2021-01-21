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
<?foreach($arResult["ITEMS"] as $arItem):?>
<?
$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
?>
<div class="history-about__item align-items-center row" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
    <div class="history-about__item-year col-md-2">
        <?=$arItem["PROPERTIES"]["YEAR"]["VALUE"];?>
    </div>
    <div class="history-about__item-img col-md-2">
        <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PROPERTIES"]["YEAR"]["VALUE"];?>"/>
    </div>
    <div class="history-about__item-content col-md-8">
        <h3><?echo $arItem["NAME"]?></h3>
        <?echo $arItem["PREVIEW_TEXT"];?>
    </div>
</div>
<?endforeach;?>
