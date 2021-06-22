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
<style>
    .blog-menu-item {
        background-size: cover;
        display: flex;
        flex-direction: column;
        width: 100%;
        margin-left: 16px;
        margin-right: 16px;
        margin-bottom: 16px;
    }
    .blog-menu-item .blog-element__title {
        margin-top: 74px;
        font-family: Montserrat;
        font-style: normal;
        font-weight: 500;
        font-size: 18px;
        line-height: 150%;
        color: #FFFFFF;
        text-transform: none;
    }
    .blog-menu-item .blog-element__description {
        font-family: Roboto;
        font-style: normal;
        font-weight: normal;
        font-size: 15px;
        line-height: 18px;
        color: #FFFFFF;
        text-transform: none;
    }
    .blog-menu-item .blog-element__footer .blog-element__date, .blog-menu-item .blog-element__footer .blog-element__time {
        color: #dadada !important;
    }
    .blog-menu-item .blog-element__footer {
        display: flex;
        justify-content: space-between;
        background: transparent;
        color: #fff;
    }
    .blog-menu-item .blog-element__category {
        left: 36px !important;
        margin-top: 20px !important;
        top: unset !important;
    }
</style>
<div class="row blog-elements-list">
<?foreach($arResult["ITEMS"] as $key=>$arItem):?>
<?
$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
?>
    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="blog-menu-item" style="background:linear-gradient(0deg, rgba(48, 48, 48, 0.8), rgba(48, 48, 48, 0.8)), url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>) no-repeat center">
        <span class="blog-element__category big-blog-element__category">
                    <?$section = CIBlockSection::GetByID($arItem["IBLOCK_SECTION_ID"]);
                    if($arSection = $section->GetNext()){
                        echo $arSection['NAME'];
                    }?>
        </span>
        <h3 class="blog-element__title"><?echo $arItem["NAME"]?></h3>
        <p class="blog-element__description"><?echo $arItem["PREVIEW_TEXT"];?></p>
        <footer class="blog-element__footer">
            <span class="blog-element__date big-blog-element__date"><?=CIBlockFormatProperties::DateFormat($arParams["DATE_CREATE"], MakeTimeStamp($arItem["DATE_CREATE"], CSite::GetDateFormat())); ?></span>
            <span class="blog-element__time big-blog-element__time"><?=$arItem["PROPERTIES"]["READ_TIME"]["VALUE"]?></span>
        </footer>
    </a>
    <!--<div class="blog-elements-list__item col-12 mb-15px px-mobile-0" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
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
    </div> -->
<?endforeach;?>
</div>
