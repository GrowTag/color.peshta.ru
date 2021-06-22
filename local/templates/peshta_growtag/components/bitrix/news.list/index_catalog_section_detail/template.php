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
$arParams["ELEMENTS"] = array_slice($arParams["ELEMENTS"], 0, 6);
?>
<?if(!empty($arParams["ELEMENTS"])):?>
<section class="index-section-2">
    <div class="container">
        <div class="row justify-content-center">
            <h2>Товары, которые заказывают с этим</h2>
        </div>
        <div class="row">
<div class="catalog-list">
    <div class="container-sm p-0">
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
        <?if(in_array($arItem["ID"], $arParams["ELEMENTS"])):?>
        <div class="catalog-list__item col-lg-2 col-md-3 col-sm-6 col-xs-12" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
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
                </div>
            </a>
        </div>
        <?endif?>
        <?endforeach;?>
        </div>
    </div>
</div>
        </div>
        <div class="row justify-content-center">
            <a href="/catalog/" class="index-section-link">Смотреть всю продукцию ></a>
        </div>
    </div>
</section>
<?endif?>