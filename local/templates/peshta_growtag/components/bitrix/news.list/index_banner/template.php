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
<style>
    .index-banner {
        width: 100%;
        background: #ed1c24;
        margin-bottom: 30px;
        top: 0;
        display: inline-flex;
        overflow: hidden;
    }
    .index-banner img {
        width: 55%;
        margin: 0 auto;
        display: block;
    }
    @media (max-width: 768px){
        .index-banner {
            margin-top: 67px;
        }
        .index-banner img {
            width: 155%;
            display: block;
        }
    }
</style>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    <?if(!empty($arItem["PROPERTIES"]["BANNER_IMG"]["VALUE"])):?>
        <?
            $arFile = CFile::GetFileArray($arItem["PROPERTIES"]["BANNER_IMG"]["VALUE"]);
        ?>
	    <div class="index-banner" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <a href="/catalog/" style="width: 100%"><img src="<?=$arFile["SRC"];?>"/></a>
	    </div>
	<?endif;?>
<?endforeach;?>
