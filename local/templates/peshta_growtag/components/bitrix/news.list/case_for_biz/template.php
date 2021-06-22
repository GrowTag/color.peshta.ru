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
<?if(!empty($arResult["ITEMS"]) && is_array($arResult["ITEMS"])):?>
<div class="catalog-section-detail-cases for-biz">
    <div class="row justify-content-center">
        <h2 class="section-title">
            Посмотрите наш кейс
        </h2>
    </div>
    <div class="container">
        <div class="row cases-elements-list">
            <?foreach($arResult["ITEMS"] as $key=>$arItem):?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <?if($arParams["ELEMENT"]==$arItem["PROPERTIES"]["FOR_BIZ"]["VALUE"] || $arParams["ELEMENT"]==$arItem["PROPERTIES"]["FOR_SUPPORT"]["VALUE"] || $arParams["ELEMENT"]==$arItem["PROPERTIES"]["FOR_PACKAGING"]["VALUE"]):?>
                <div class="col-sm-12">
                    <div class="cases-elements-list__item">
                        <div class="cases-elements-list__item-img">
                            <img src="<?=CFile::GetPath($arItem["PROPERTIES"]["BIG_IMAGE"]["VALUE"]);?>" alt="<?echo $arItem["NAME"]?>">
                        </div>
                        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="case-content-wrap">
                            <h3 class="case-content__title"><?echo $arItem["NAME"]?></h3>
                            <p class="case-content__description">
                                Смотреть кейс&nbsp;<img src="<?=SITE_TEMPLATE_PATH?>/images/array-right.svg">
                            </p>
                        </a>
                    </div>
                </div>
                <?endif;?>
            <?endforeach;?>
        </div>
    </div>
</div>
<?endif?>