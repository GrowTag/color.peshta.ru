<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?
$APPLICATION->SetPageProperty("description", "Мы печатаем полиграфию в Ижевске. Оперативная поддержка яркими промо-материалами для роста бизнеса.");
$APPLICATION->SetPageProperty("keywords", "типография, ижевск, визитки, фирменный стиль, заказать визитки, упаковка, печать, штампы, буклеты, полиграфия, нумераторы, полиграфия для бизнеса");
$APPLICATION->SetPageProperty("title", "ПЕШТА - Авторизация");
$APPLICATION->SetTitle("Авторизация");
//ShowMessage($arParams["~AUTH_RESULT"]);
//ShowMessage($arResult['ERROR_MESSAGE']);
//var_dump($arResult['ERROR_MESSAGE']);
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
            <h1>Авторизация</h1>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="bx-auth">
                <form name="form_auth" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">

                    <input type="hidden" name="AUTH_FORM" value="Y" />
                    <input type="hidden" name="TYPE" value="AUTH" />
                    <?if (strlen($arResult["BACKURL"]) > 0):?>
                        <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
                    <?endif?>
                    <?foreach ($arResult["POST"] as $key => $value):?>
                        <input type="hidden" name="<?=$key?>" value="<?=$value?>" />
                    <?endforeach?>

                    <div class="col-12 justify-content-center align-items-center">
                        <!--<label for="USER_LOGIN"><?=GetMessage("AUTH_LOGIN")?></label>-->
                        <input placeholder="<?=GetMessage("AUTH_LOGIN")?>" class="bx-auth-input" type="text" name="USER_LOGIN" id="USER_LOGIN" maxlength="255" value="<?=$arResult["LAST_LOGIN"]?>" />
                    </div>
                    <div class="col-12 justify-content-center align-items-center">
                        <!--<label for="USER_PASSWORD"><?=GetMessage("AUTH_PASSWORD")?></label>-->
                        <input placeholder="<?=GetMessage("AUTH_PASSWORD")?>" class="bx-auth-input" type="password" name="USER_PASSWORD" maxlength="255" autocomplete="off" />
                        <?if($arResult["SECURE_AUTH"]):?>
                            <span class="bx-auth-secure" id="bx_auth_secure" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
                                <div class="bx-auth-secure-icon"></div>
                            </span>
                            <noscript>
				                <span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
					                <div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
				                </span>
                            </noscript>
                            <script type="text/javascript">
                                document.getElementById('bx_auth_secure').style.display = 'inline-block';
                            </script>
                        <?endif?>
                    </div>
                    <div class="col-12 justify-content-center align-items-center">
                        <?if($arResult["CAPTCHA_CODE"]):?>
                            <input type="hidden" name="captcha_sid" value="<?echo $arResult["CAPTCHA_CODE"]?>" />
                            <img src="/bitrix/tools/captcha.php?captcha_sid=<?echo $arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
                            <input class="bx-auth-input" type="text" name="captcha_word" maxlength="50" value="" size="15" />
                        <?endif;?>
                    </div>
                    <div class="col-12 justify-content-center align-items-center">
                        <p class="store-password mb-0">
                            <?if ($arResult["STORE_PASSWORD"] == "Y"):?>
                                <input type="checkbox" id="USER_REMEMBER" name="USER_REMEMBER" value="Y" /><label for="USER_REMEMBER">&nbsp;<?=GetMessage("AUTH_REMEMBER_ME")?></label>
                            <?endif?>
                        </p>

                            <p class="auth__title">Авторизуйтесь через соц. сети:</p>
                            <p>
                                <?
                                $APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "",
                                    array(
                                        "AUTH_SERVICES" => $arResult["AUTH_SERVICES"],
                                        "CURRENT_SERVICE" => $arResult["CURRENT_SERVICE"],
                                        "AUTH_URL" => $arResult["AUTH_URL"],
                                        "POST" => $arResult["POST"],
                                        "SHOW_TITLES" => $arResult["FOR_INTRANET"]?'N':'Y',
                                        "FOR_SPLIT" => $arResult["FOR_INTRANET"]?'Y':'N',
                                        "AUTH_LINE" => $arResult["FOR_INTRANET"]?'N':'Y',
                                    ),
                                    $component,
                                    array("HIDE_ICONS"=>"Y")
                                );
                                ?>
                            </p>

                        <p>
                            <input type="submit" class="auth-section-button__orange" name="Login" value="<?=GetMessage("AUTH_AUTHORIZE")?>" />
                        </p>
                    </div>
                    <div class="col-12 justify-content-center align-items-center">
                        <?if ($arParams["NOT_SHOW_LINKS"] != "Y"):?>
                            <noindex>
                                <p>
                                    <a class="auth-section-button" href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></a>
                                </p>
                            </noindex>
                        <?endif?>
                    </div>
                    <div class="col-12 justify-content-center align-items-center">
                        <?if($arParams["NOT_SHOW_LINKS"] != "Y" && $arResult["NEW_USER_REGISTRATION"] == "Y" && $arParams["AUTHORIZE_REGISTRATION"] != "Y"):?>
                            <noindex>
                                <p>
                                    <a class="auth-section-button registration" href="<?=$arResult["AUTH_REGISTER_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_REGISTER")?></a><br />
                                    <?=GetMessage("AUTH_FIRST_ONE")?>
                                </p>
                            </noindex>
                        <?endif?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    <?if (strlen($arResult["LAST_LOGIN"])>0):?>
    try{document.form_auth.USER_PASSWORD.focus();}catch(e){}
    <?else:?>
    try{document.form_auth.USER_LOGIN.focus();}catch(e){}
    <?endif?>
</script>
