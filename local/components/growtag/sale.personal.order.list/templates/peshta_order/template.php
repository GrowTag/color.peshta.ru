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
<?if(!empty($arResult["ERROR_MESSAGE"]))
{?>
    <script type="text/javascript">
        $(document).ready(function() {
            toastr.error('<?=$arResult["ERROR_MESSAGE"];?>', 'УПС!...');
        });
    </script>
<?}
if(strlen($arResult["OK_MESSAGE"]) > 0)
{
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            toastr.success('<?=$arResult["OK_MESSAGE"]?>', 'Успешно!');
        });
    </script>
    <?
}
?>
<?if(empty($arResult["ORDERS"]) && isset($_GET["page"])){?>
    <div class="d-flex justify-content-center align-items-center">
        Это пустая страница, вернитесь в начало
    </div>
    <div class="d-flex justify-content-center align-items-center mt-4">
        <a class="red-button" href="/personal/">В начало</a>
    </div>
<?}?>
<?if(empty($arResult["ORDERS"]) && !isset($_GET["page"])){?>
    <div class="d-flex justify-content-center align-items-center">
        У вас пока нет заказов
    </div>
<?}?>
<?foreach ($arResult["ORDERS"] as $order):?>
<div class="order mb-2" id="order_<?=$order["ID"]?>">
    <div class="order__header d-flex justify-content-between">
        <div class="d-flex order__header-title">
            Заказ № <?=$order["NUMBER"]?> / <?=$order["PRODUCT_NAME"]?>
        </div>
        <div class="d-flex order__header-status" style="<?if($order["STATUS"]["ID"] == "F"):?>background: #89D34E;<?else:?>background: #0075FF;<?endif;?>">
            <?=$order["STATUS"]["NAME"];?>
        </div>
    </div>
    <div class="order__date d-flex">
        от <?=$order["DATE"]?>
    </div>
    <div class="order__details">
        <?foreach ($order["PROPERTIES"] as $property):?>
            <?if($property["CODE"] == "PROPERTIES"):?>
                <?foreach(explode(";", $property["VALUE"]) as $str):?>
                    <div><?=$str;?></div>
                <?endforeach;?>
            <?endif;?>
        <?endforeach;?>
        <?foreach ($order["PROPERTIES"] as $property):?>
            <?if($property["CODE"] == "MAKET" && !empty($property["VALUE"])):?>
                <div class="order__details-button">
                    <a download href="<?=CFile::GetPath($property["VALUE"]);?>">Смотреть макет</a>
                </div>
            <?endif;?>
        <?endforeach;?>
    </div>
    <div class="order__sum d-flex justify-content-between align-items-center">
        <div class="d-flex">Итого</div>
        <?if($order["PRICE"] == 0):?>
            <div class="d-flex">Индивидуальный расчет</div>
        <?else:?>
            <?if($order["PRICE"] != $order["BASE_PRICE"]):?>
                <div class="d-flex"><span><?=$order["BASE_PRICE"]?> ₽</span> <?=$order["PRICE"]?> ₽</div>
            <?else:?>
                <div class="d-flex"><?=$order["BASE_PRICE"]?> ₽</div>
            <?endif;?>
        <?endif;?>
    </div>
    <div class="order__buttons d-flex justify-content-between align-items-center">
        <a href="/personal/?copy=<?=$order["ID"]?>&PARAMS_HASH=<?=$arResult["PARAMS_HASH"];?>">Дублировать заказ</a>
        <a <?if($order["STATUS"]["ID"] == "F"):?>hidden <?endif;?> href="/personal/?delete=<?=$order["ID"]?>&PARAMS_HASH=<?=$arResult["PARAMS_HASH"];?>">Удалить заказ</a>
    </div>
</div>
<?endforeach;?>
<br/>
<?
$APPLICATION->IncludeComponent(
    "bitrix:main.pagenavigation",
    "",
    array(
        "NAV_OBJECT" => $arResult["NAV"],
        "SEF_MODE" => "N",
        "SHOW_COUNT" => "N",
        "SHOW_ALWAYS" => "N"
    ),
    false
);
?>
