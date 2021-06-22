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
$this->setFrameMode(false);

$arParams["DATE_CREATE"]="j F Y";
?>
<div class="row">
<?foreach($arResult["ITEMS"] as $key=>$arItem):?>
<?
$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
?>
<?if($key == 0 && !isset($_GET["PAGEN_1"]) && $arParams["FIRST_ELEMENT"] == "Y"):?>
    <div class="col-12 mb-30px px-mobile-0" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="big-blog-element">
            <div class="big-blog-element__left-col">
                <h3 class="big-blog-element__title"><?echo $arItem["NAME"]?></h3>
                <p class="big-blog-element__description"><?echo $arItem["PREVIEW_TEXT"];?></p>
                <footer class="big-blog-element__footer">
                    <span class="big-blog-element__time"><?=$arItem["PROPERTIES"]["READ_TIME"]["VALUE"]?></span>
                    <span class="big-blog-element__date"><?=CIBlockFormatProperties::DateFormat($arParams["DATE_CREATE"], MakeTimeStamp($arItem["DATE_CREATE"], CSite::GetDateFormat())); ?></span>
                </footer>
            </div>
            <div class="big-blog-element__right-col">
                <span class="big-blog-element__category">
                    <?$section = CIBlockSection::GetByID($arItem["IBLOCK_SECTION_ID"]);
                    if($arSection = $section->GetNext()){
                        echo $arSection['NAME'];
                    }?>
                </span>
                <div class="big-blog-element__img-wrap">
                    <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?echo $arItem["NAME"]?>" class="big-blog-element__img">
                </div>
            </div>
        </a>
    </div>
<?else:?>
    <div class="col-sm-4 mb-30px px-mobile-0" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="blog-element">
            <header class="blog-element__header">
                <span class="blog-element__category big-blog-element__category">
                    <?$section = CIBlockSection::GetByID($arItem["IBLOCK_SECTION_ID"]);
                    if($arSection = $section->GetNext()){
                        echo $arSection['NAME'];
                    }?>
                </span>
                <div class="blog-element__img-wrap big-blog-element__img-wrap">
                    <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?echo $arItem["NAME"]?>" class="blog-element__img big-blog-element__img">
                </div>
            </header>
            <h3 class="blog-element__title"><?echo $arItem["NAME"]?></h3>
            <p class="blog-element__description"><?echo $arItem["PREVIEW_TEXT"];?></p>
            <footer class="blog-element__footer big-blog-element__footer">
                <span class="blog-element__date big-blog-element__date"><?=CIBlockFormatProperties::DateFormat($arParams["DATE_CREATE"], MakeTimeStamp($arItem["DATE_CREATE"], CSite::GetDateFormat())); ?></span>
                <span class="blog-element__time big-blog-element__time"><?=$arItem["PROPERTIES"]["READ_TIME"]["VALUE"]?></span>
            </footer>
        </a>
    </div>
<?endif;?>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
