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
<?if(!empty($arResult["ITEMS"]) && is_array($arResult["ITEMS"])):?>
<section class="digital-section-2">
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="section-title mt-4">
                Зачем это нужно вам?
            </h2>
        </div>
        <div class="digital-slider row align-items-center justify-content-center">
            <?foreach($arResult["ITEMS"] as $key=>$arItem):?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <?if($arItem["PROPERTIES"]["FOR_SUPPORT"]["VALUE"]==$arParams["ELEMENT"]):?>
                    <div class="col-md-4 col-sm-12 p-0">
                        <div class="digital-slider__item">
                            <div class="digital-slider__item-title">
                                <?echo $arItem["NAME"]?>
                            </div>
                            <div class="digital-slider__item-text">
                                <?=$arItem["PREVIEW_TEXT"];?>
                            </div>
                        </div>
                    </div>
                <?endif;?>
            <?endforeach;?>
        </div>
    </div>
</section>
<?endif;?>