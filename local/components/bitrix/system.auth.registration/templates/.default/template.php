<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="section-auth d-flex justify-content-center align-items-center mb-4">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <h1><?=GetMessage("AUTH_REGISTER")?></h1>
        </div>
        <div class="row justify-content-center align-items-center mt-4">
            <div class="bx-auth">
                <?
                ShowMessage($arParams["~AUTH_RESULT"]);

                $APPLICATION->IncludeComponent(
                    "bitrix:main.register",
                    "growtag",
                    Array(
                        "USER_PROPERTY_NAME" => "",
                        "SEF_MODE" => "N",
                        "SHOW_FIELDS" => Array("NAME","PERSONAL_PHONE"),
                        "REQUIRED_FIELDS" => Array("PERSONAL_PHONE"),
                        "AUTH" => "Y",
                        "USE_BACKURL" => "Y",
                        "SUCCESS_PAGE" => $APPLICATION->GetCurPageParam('',array('backurl')),
                        "SET_TITLE" => "N",
                        "USER_PROPERTY" => Array()
                    )
                );

                ?><p><a class="auth-section-button" href="<?=$arResult["AUTH_AUTH_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_AUTH")?></a></p><?

                ?>
            </div>
        </div>
    </div>
</div>
