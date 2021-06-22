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
<?foreach($arResult["ITEMS"] as $key=>$arItem):?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <?if($arItem["PROPERTIES"]["BIZ"]["VALUE"]==$arParams["ELEMENT"]):?>
    <div <?if($key==0):?>style="margin-top:20px;border-top: 1px solid #DADADA;"<?endif;?> class="tasks-list__item row" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="col-md-6 col-12">
            <div class="item-title">
                Задача:
            </div>
            <div class="item-body">
                <?echo $arItem["NAME"]?>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="item-title">
                Решение:
            </div>
            <div class="item-body d-flex">
                <?foreach ($arItem["PROPERTIES"]["ITEMS"]["VALUE"] as $item):?>
                    <div class="task-result">
                        <img src="<?=SITE_TEMPLATE_PATH;?>/images/task-ok.svg">&nbsp;<?=$item;?>
                    </div>
                <?endforeach;?>
            </div>
        </div>
    </div>
    <?endif;?>
<?endforeach;?>
<div class="row justify-content-center mt-4 mb-5 pl-3 pr-3">
    <a href="#" data-target="#modalSettlement" data-toggle="modal" class="btn btn--outline-red">ЗАКАЗАТЬ КОМПЛЕКСНОЕ РЕШЕНИЕ</a>
</div>
