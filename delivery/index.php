<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Выйдите на новый уровень скорости печати и результативности продаж, маркетинга и рекламы с цифровыми технологиями «Пешта Digital®»");
$APPLICATION->SetPageProperty("keywords", "типография, ижевск, визитки, фирменный стиль, заказать визитки, упаковка, печать, штампы, буклеты, полиграфия, нумераторы, полиграфия для бизнеса");
$APPLICATION->SetPageProperty("title", "ПЕШТА - Условия доставки");
$APPLICATION->SetTitle("Условия доставки");
$APPLICATION->SetPageProperty('canonical', "https://".$_SERVER['HTTP_HOST'].$APPLICATION->GetCurPage());
?>
<section class="digital-section-1">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="digital-section-1__title">
                <h1>Условия доставки</h1>
            </div>
        </div>
    </div>
</section>
<section class="delivery-content pt-4 pb-5">
    <div class="container">
        <div class="row">
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                    "AREA_FILE_SHOW" => "file",
                    "AREA_FILE_SUFFIX" => "inc",
                    "EDIT_TEMPLATE" => "",
                    "PATH" => "/include/delivery.php"
                )
            );?>
        </div>
    </div>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>