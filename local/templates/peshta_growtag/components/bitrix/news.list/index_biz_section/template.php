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

$themeClass = isset($arParams['TEMPLATE_THEME']) ? ' bx-'.$arParams['TEMPLATE_THEME'] : '';

$dbSection = CIBlockSection::GetList(Array(), array("ID" => $arParams["PARENT_SECTION"], "IBLOCK_ID" => $arParams["IBLOCK_ID"]), false ,Array("UF_COLOR"));
if($arSection = $dbSection->GetNext()){
    $arResult["SECTION"]["PATH"][0]["PROPERTIES"] = $arSection;
}
?>
<div class="catalog-list row" style="background-color: <?=$arResult["SECTION"]["PATH"][0]["PROPERTIES"]["UF_COLOR"];?>">
    <div class="container-sm">
        <h2 class="catalog-list__title"><?=$arResult["SECTION"]["PATH"][0]["DESCRIPTION"];?></h2>
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
                    <!--<a class="catalog-list__item-card-button-modal" href="<?echo $arItem["DETAIL_PAGE_URL"]?>">??????????????????</a>-->
                    <!--<a class="catalog-list__item-card-button-modal" data-toggle="modal" data-target="#staticBackdrop" href="#">????????????????</a>-->
                </div>
            </a>
        </div>
        <?endforeach;?>
        </div>
    </div>
</div>
