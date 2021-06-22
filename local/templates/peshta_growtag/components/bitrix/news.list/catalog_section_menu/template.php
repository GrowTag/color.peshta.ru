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
<div class="menu-catalog-list">
    <div class="menu-catalog-list__title">
        <?=$arResult["SECTION"]["PATH"][0]["DESCRIPTION"];?>
        <div class="menu-catalog-list__links">
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
                <div class="link" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <a itemprop="url" href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
                        <div class="link__title">
                            <?if(empty($arItem["PROPERTIES"]["MENU_NAME"]["VALUE"])){
                                print $arItem["NAME"];
                            } else {
                                print $arItem["PROPERTIES"]["MENU_NAME"]["VALUE"];
                            }
                            ?>
                        </div>
                    </a>
                </div>
            <?endforeach;?>
        </div>
    </div>
</div>
