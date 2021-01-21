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
    <div class="reviews-slider__item d-flex align-items-start flex-column align-self-end bd-highlight" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="p-2 bd-highlight">
            <div class="reviews-slider__item-content-text mb-2">
                <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                    <?echo $arItem["PREVIEW_TEXT"];?>
                <?endif;?>
            </div>
        </div>
        <div class="p-2 bd-highlight">
            <div class="reviews-slider__item-title row">
                <div class="reviews-slider__item-title-img mr-2">
                    <img src="
                    <?if(empty($arItem["PREVIEW_PICTURE"]["SRC"])):?>
                        <?=SITE_TEMPLATE_PATH."/images/default-avatar.svg"?>
                    <?else:?>
                        <?=$arItem["PREVIEW_PICTURE"]["SRC"]?>
                    <?endif;?>
                "/>
                </div>
                <div class="reviews-slider__item-title-text">
                    <span><?=$arItem["PROPERTIES"]["SERVICE"]["VALUE"]?></span>
                    <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                        <?=$arItem["NAME"];?>
                    <?endif;?>
                </div>
            </div>
        </div>
    </div>
<?endforeach;?>
