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
<div class="row new-videos-slider">
    <?foreach($arResult["ITEMS"] as $arItem):?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

    $arImg = explode("=", $arItem["PROPERTIES"]["LINK"]["VALUE"]);
    $imgLink = "https://img.youtube.com/vi/".$arImg[1]."/0.jpg";
    ?>
        <div class="new-videos-slider__item col-sm-4 mb-30px px-mobile-0" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <a href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>" class="video-element" target="_blank">
                <header class="video-element__header">
                    <div class="video-element__play">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="40" height="40" rx="20" fill="white"></rect>
                            <path d="M25 20L17 25L17 15L25 20Z" fill="#FA3F3F"></path>
                        </svg>
                    </div>
                    <img src="<?=$imgLink;?>" alt="<?=$arItem["NAME"]?>" class="video-element__img">
                </header>
                <h3 class="video-element__title"><?=$arItem["NAME"]?></h3>
            </a>
        </div>
    <?endforeach;?>
</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
