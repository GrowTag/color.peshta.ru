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

$APPLICATION->SetPageProperty('canonical', "https://".$_SERVER['HTTP_HOST'].$APPLICATION->GetCurPage());

$themeClass = isset($arParams['TEMPLATE_THEME']) ? ' bx-'.$arParams['TEMPLATE_THEME'] : '';
?>
<div class="catalog-list row" style="background-color: #ffffff">
    <div class="container-sm">
        <div class="row m-0">
        <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction(
            $arItem['ID'],
            $arItem['EDIT_LINK'],
            CIBlock::GetArrayByID(
                $arItem["IBLOCK_ID"],
                "ELEMENT_EDIT"
            )
        );
        $this->AddDeleteAction(
            $arItem['ID'],
            $arItem['DELETE_LINK'],
            CIBlock::GetArrayByID(
                $arItem["IBLOCK_ID"],
                "ELEMENT_DELETE"),
            array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'))
        );
        ?>
        <div class="catalog-list__item col-md-3 col-sm-6 col-xs-12" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
                <div class="catalog-list__item-card">
                    <img
                        src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                        class="catalog-list__item-card-img"
                        alt="<?echo $arItem["NAME"]?>"
                    />
                    <div class="catalog-list__item-card-title">
                        <?echo $arItem["NAME"]?>
                    </div>
                    <!--<div class="catalog-list__item-card-description">
                        <?echo $arItem["PREVIEW_TEXT"]?>
                    </div>-->
                </div>
            </a>
        </div>
        <?endforeach;?>
        </div>
    </div>
</div>
