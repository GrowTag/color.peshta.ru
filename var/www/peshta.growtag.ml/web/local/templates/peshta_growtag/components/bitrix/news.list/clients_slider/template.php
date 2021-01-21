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
<div class="row comp-first-slider">
    <div class="comp-first-slider__items col-md-4 col-sm-5 col-xs-12 m-0 p-0">
        <div class="comp-first-slider__text-mobile col- m-0 p-0">
            <h2>Мы печатаем для профессионалов своего дела</h2>
        </div>
        <div class="slider-for">
            <?foreach($arResult["ITEMS"] as $arItem):?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
                <img id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="slider-for__item" src="<?=SITE_TEMPLATE_PATH?>/images/default.gif" data-src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"/>
            <?endforeach;?>
        </div>
    </div>
    <div class="comp-first-slider__text col-md-6 col-sm-7 col-xs-12">
        <h2>Мы печатаем для профессионалов своего дела</h2>
    </div>
</div>
<div class="row comp-second-slider">
    <div class="slider-nav">

            <?foreach($arResult["ITEMS"] as $arItem):?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="slider-nav__item">
                <img id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="slider-nav__item" src="<?=CFile::GetPath($arItem["PROPERTIES"]["PAGINATOR_IMG"]["VALUE"])?>"/>
            </div>
            <?endforeach;?>
    </div>
</div>
