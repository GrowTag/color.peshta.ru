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
<div class="personal-section__content-stamp d-flex justify-content-center align-items-center">
    <div class="stamp-image">
        <div class="image-wrap">
            <span><?=$arResult["USER_IMPRINT"];?></span>
            <img alt="Digital" src="/local/templates/peshta_growtag/images/giftbox.svg">
        </div>
    </div>
    <div class="stamp-content">
        <div class="stamp-content__title">
            Экономьте&nbsp;с программой Пешта Digital
        </div>
        <div class="stamp-content__text">
            <?=$arResult["TEXT"];?>
        </div>
    </div>
</div>
