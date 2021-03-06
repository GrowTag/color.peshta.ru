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
<div class="catalog-section-detail-cases__list d-flex">
<?foreach($arResult["ITEMS"] as $arItem):?>
    <?if($arParams["ELEMENT_ID"] == $arItem["ID"]):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <?foreach ($arItem["PROPERTIES"]["IMAGES"]["VALUE"] as $img):?>
            <div class="list__item d-flex" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <img src="<?=CFile::GetPath($img);?>"/>
            </div>
        <?endforeach;?>
	<?endif;?>
<?endforeach;?>
</div>
