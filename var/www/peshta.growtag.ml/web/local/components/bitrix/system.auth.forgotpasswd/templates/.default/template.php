<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?
//var_dump($arParams["~AUTH_RESULT"]);

$APPLICATION->SetPageProperty("description", "Мы печатаем полиграфию в Ижевске. Оперативная поддержка яркими промо-материалами для роста бизнеса.");
$APPLICATION->SetPageProperty("keywords", "типография, ижевск, визитки, фирменный стиль, заказать визитки, упаковка, печать, штампы, буклеты, полиграфия, нумераторы, полиграфия для бизнеса");
$APPLICATION->SetPageProperty("title", "ПЕШТА - Восстановление пароля");
$APPLICATION->SetTitle("Восстановление пароля");

if(!empty($arParams["~AUTH_RESULT"]["MESSAGE"]) && $arParams["~AUTH_RESULT"]["MESSAGE"] != null && $arParams["~AUTH_RESULT"]["TYPE"] == "ERROR"):?>
    <script type="text/javascript">
        toastr.error('<?=$arParams["~AUTH_RESULT"]["MESSAGE"];?>', 'УПС!...')
    </script>
<?endif?>
<?if(!empty($arParams["~AUTH_RESULT"]["MESSAGE"]) && $arParams["~AUTH_RESULT"]["MESSAGE"] != null && $arParams["~AUTH_RESULT"]["TYPE"] == "OK"):?>
    <script type="text/javascript">
        toastr.success('<?=$arParams["~AUTH_RESULT"]["MESSAGE"];?>', 'Отлично!')
    </script>
<?endif?>
<div class="section-auth d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <h1>Восстановление</h1>
        </div>
        <div class="row justify-content-center align-items-center mt-4">
        <form class="bform" name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
            <?
            if (strlen($arResult["BACKURL"]) > 0)
            {
                ?>
                <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
                <?
            }
            ?>
            <input type="hidden" name="AUTH_FORM" value="Y">
            <input type="hidden" name="TYPE" value="SEND_PWD">

            <div class="row justify-content-center align-items-center">
                <p><?echo GetMessage("sys_forgot_pass_label")?></p>
                <p>
                    <input class="bx-auth-input" placeholder="<?=GetMessage("sys_forgot_pass_login1")?>" type="text" name="USER_LOGIN" value="<?=$arResult["LAST_LOGIN"]?>" />
                    <input type="hidden" name="USER_EMAIL" />
                </p>
                <p><?echo GetMessage("sys_forgot_pass_note_email")?></p>

                <?if($arResult["PHONE_REGISTRATION"]):?>
                    <div style="margin-top: 16px">
                        <div><input placeholder="<?=GetMessage("sys_forgot_pass_phone")?>" class="bx-auth-input" type="text" name="USER_PHONE_NUMBER" value="" /></div>
                        <div><?echo GetMessage("sys_forgot_pass_note_phone")?></div>
                    </div>
                <?endif;?>

                <?if($arResult["USE_CAPTCHA"]):?>
                    <div style="margin-top: 16px">
                        <div>
                            <input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
                            <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
                        </div>
                        <div><?echo GetMessage("system_auth_captcha")?></div>
                        <div><input class="bx-auth-input" type="text" name="captcha_word" maxlength="50" value="" /></div>
                    </div>
                <?endif?>
                <div style="width:100%;margin-top: 20px">
                    <input type="submit" class="auth-section-button__orange" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>" />
                </div>
            </div>
            <div class="row justify-content-center align-items-center mt-2">
                <a class="auth-section-button" href="<?=$arResult["AUTH_AUTH_URL"]?>"><?=GetMessage("AUTH_AUTH")?></a>
            </div>
        </form>
        </div>
    </div>
</div>

<script type="text/javascript">
document.bform.onsubmit = function(){document.bform.USER_EMAIL.value = document.bform.USER_LOGIN.value;};
document.bform.USER_LOGIN.focus();
</script>
