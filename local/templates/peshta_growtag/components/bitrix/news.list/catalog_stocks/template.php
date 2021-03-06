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

$backgroundImage = SITE_TEMPLATE_PATH."/images/index-slider-bg.png";
?>
<div class="index-slider">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

        if(isset($arItem["PROPERTIES"]["BACKGROUND_IMAGE"]["VALUE"]) && !empty($arItem["PROPERTIES"]["BACKGROUND_IMAGE"]["VALUE"])){
           $backgroundImage = CFile::GetPath($arItem["PROPERTIES"]["BACKGROUND_IMAGE"]["VALUE"]);
        }
        ?>
        <div id="<?=$this->GetEditAreaId($arItem['ID']);?>" style="background: url(<?=$backgroundImage;?>) no-repeat;background-size: cover;">
            <div class="container p-0">
                <div class="row">
                    <div class="col-md-7">
                        <div class="slide-title mt-5">
                            <h1><?=$arItem["NAME"];?></h1>
                        </div>
                        <div class="slide-desc mt-4">
                            <?=$arItem["PREVIEW_TEXT"];?>
                        </div>
                        <div class="slide-button mt-5">
                            <a href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"];?>">
                                <?if(isset($arItem["PROPERTIES"]["LINK_TITLE"]["VALUE"]) && !empty($arItem["PROPERTIES"]["LINK_TITLE"]["VALUE"])):?>
                                    <?=$arItem["PROPERTIES"]["LINK_TITLE"]["VALUE"];?>
                                <?else:?>
                                    ??????????????????
                                <?endif;?>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="slide-img">
                            <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"];?>"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?endforeach;?>
</div>
