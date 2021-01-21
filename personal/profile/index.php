<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Настройки пользователя");
?>
    <div class="section-profile d-flex justify-content-center align-items-center">
        <div class="container-sm">
            <div class="row justify-content-center align-items-center" style="max-width: 600px">
                <h1>Настройки пользователя</h1>
                <?$APPLICATION->IncludeComponent("bitrix:main.profile", "peshta_profile", Array(
                    "SET_TITLE" => "Y",	// Устанавливать заголовок страницы
                ),
                    false
                );?>
            </div>
        </div>
    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
