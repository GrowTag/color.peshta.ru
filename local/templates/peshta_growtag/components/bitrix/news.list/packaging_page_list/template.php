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
<div class="row justify-content-center">
    <?foreach($arResult["ITEMS"] as $key=>$arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="col-sm-6 mb-4">
            <div class="cases-elements-list__item">
                <div class="cases-elements-list__item-img">
                    <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?echo $arItem["NAME"]?>">
                </div>
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="case-content-wrap">
                    <h3 class="case-content__title"><?echo $arItem["NAME"]?></h3>
                    <p class="case-content__description">
                        Узнать больше&nbsp;<img src="<?=SITE_TEMPLATE_PATH?>/images/array-right.svg">
                    </p>
                </a>
            </div>
        </div><br/>
    <?endforeach;?>
</div>
