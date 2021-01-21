<?php
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();

/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

//CModule::IncludeModule("iblock");

$arResult["PARAMS_HASH"] = md5(serialize($arParams).$this->GetTemplateName());

$arParams["USE_CAPTCHA"] = (($arParams["USE_CAPTCHA"] != "N" && !$USER->IsAuthorized()) ? "Y" : "N");
$arParams["EVENT_NAME"] = trim($arParams["EVENT_NAME"]);
if($arParams["EVENT_NAME"] == '')
	$arParams["EVENT_NAME"] = "FEEDBACK_FORM";
$arParams["EMAIL_TO"] = trim($arParams["EMAIL_TO"]);
if($arParams["EMAIL_TO"] == '')
	$arParams["EMAIL_TO"] = COption::GetOptionString("main", "email_from");
$arParams["OK_TEXT"] = trim($arParams["OK_TEXT"]);
if($arParams["OK_TEXT"] == '')
	$arParams["OK_TEXT"] = GetMessage("MF_OK_MESSAGE");

if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"] <> '' && (!isset($_POST["PARAMS_HASH"]) || $arResult["PARAMS_HASH"] === $_POST["PARAMS_HASH"]))
{
	$arResult["ERROR_MESSAGE"] = array();
	if(check_bitrix_sessid())
	{
		if(empty($arParams["REQUIRED_FIELDS"]) || !in_array("NONE", $arParams["REQUIRED_FIELDS"]))
		{
		    if(!isset($_POST["USER_ID"])){
                if((empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])) && strlen($_POST["user_name"]) <= 1)
                    $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_NAME");
                if((empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"])) && strlen($_POST["user_phone"]) <= 1)
                    $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_PHONE");
            }
		}

		// reCAPTCHA
		if(!empty($_POST['recaptcha_response'])){
            $recaptcha_key = '6Lf9BLcZAAAAAOwHVQDpd7BAGHv3m9f8o-7qzOj-';

            $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
            $recaptcha_params = [
                'secret' => $recaptcha_key,
                'response' => $_POST['recaptcha_response'],
                'remoteip' => $_SERVER['REMOTE_ADDR'],
            ];

            $ch = curl_init($recaptcha_url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $recaptcha_params);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $response = curl_exec($ch);
            if (!empty($response)) {
                $decoded_response = json_decode($response);
            }

            $recaptcha_success = false;

            if ($decoded_response && $decoded_response->score > 0) {
                $recaptcha_success = $decoded_response->score;
            } else {
                $arResult["ERROR_MESSAGE"][] = GetMessage("MF_CAPTCHA_WRONG");
            }
        } else {
            $arResult["ERROR_MESSAGE"][] = GetMessage("MF_CAPTCHA_EMPTY");
        }

        if(isset($_POST["USER_ID"]) && is_array($_POST["PROPS"]) && empty($arResult["ERROR_MESSAGE"])){
            $strProp = "";
            $el = new CIBlockElement;

            foreach ($_POST["PROPS"] as $prop){
                $strPropMail .= $prop."\n\r";
                $strPropElem .= $prop."<br/>";
            }

            $strPropElem .= "<br/>Итого: ".htmlspecialcharsbx($_POST["PRICE"]);
            $strPropMail .= "\n\rИтого: ".htmlspecialcharsbx($_POST["PRICE"]);

            $arOrderFields = Array(
                "USER" => htmlspecialcharsbx($_POST["USER_ID"]),
                "CONTENT" => $strPropElem
            );

            $arLoadProductArray = Array(
                "MODIFIED_BY"    => htmlspecialcharsbx($_POST["USER_ID"]), // элемент изменен текущим пользователем
                "IBLOCK_SECTION_ID" => true,          // элемент лежит в корне раздела
                "IBLOCK_ID"      => 4,
                "PROPERTY_VALUES"=> $arOrderFields,
                "NAME"           => htmlspecialcharsbx($_POST["ELEMENT_NAME"]),
                "ACTIVE"         => "Y",            // активен
            );

            if(!$el->Add($arLoadProductArray)) {
                $arResult["ERROR_MESSAGE"][] = $el->LAST_ERROR;
            }
        }

		if(empty($arResult["ERROR_MESSAGE"]))
        {

            if(isset($_POST["USER_ID"])){
                $rsUser = CUser::GetByID($_POST["USER_ID"]);
                $arUser = $rsUser->Fetch();

                $arFields = Array(
                    "AUTHOR" => $USER->GetFullName(),
                    "AUTHOR_PHONE" => $arUser["PERSONAL_PHONE"],
                    "EMAIL_TO" => $arParams["EMAIL_TO"],
                    "AUTHOR_EMAIL" => $USER->GetEmail(),
                    "TEXT" => htmlspecialcharsbx($_POST["ELEMENT_NAME"]).":\n\r".$strPropMail,
                );
            } else {
                $arFields = Array(
                    "AUTHOR" => $_POST["user_name"],
                    "AUTHOR_PHONE" => $_POST["user_phone"],
                    "EMAIL_TO" => $arParams["EMAIL_TO"],
                    "AUTHOR_EMAIL" => $_POST["user_email"],
                    "TEXT" => "",
                );
            }

			if(!empty($arParams["EVENT_MESSAGE_ID"]))
			{
				foreach($arParams["EVENT_MESSAGE_ID"] as $v){
                    if(IntVal($v) > 0){
                        CEvent::SendImmediate($arParams["EVENT_NAME"], SITE_ID, $arFields, "N", IntVal($v));
                    }
                }
			} else {
                CEvent::SendImmediate($arParams["EVENT_NAME"], SITE_ID, $arFields);
            }

			if(!isset($_POST["USER_ID"])){
                $_SESSION["MF_NAME"] = htmlspecialcharsbx($_POST["user_name"]);
                $_SESSION["MF_EMAIL"] = htmlspecialcharsbx($_POST["user_phone"]);
            }

			LocalRedirect($APPLICATION->GetCurPageParam("success=".$arResult["PARAMS_HASH"], Array("success")));
		}
        if(!isset($_POST["USER_ID"])){
            //$arResult["MESSAGE"] = htmlspecialcharsbx($_POST["MESSAGE"]);
            $arResult["AUTHOR_NAME"] = htmlspecialcharsbx($_POST["user_name"]);
            $arResult["AUTHOR_PHONE"] = htmlspecialcharsbx($_POST["user_phone"]);
        }
	} else {
        $arResult["ERROR_MESSAGE"][] = GetMessage("MF_SESS_EXP");
    }
} elseif($_REQUEST["success"] == $arResult["PARAMS_HASH"]) {

	$arResult["OK_MESSAGE"] = $arParams["OK_TEXT"];
}

if(empty($arResult["ERROR_MESSAGE"]) && !isset($_POST["USER_ID"]))
{
	if($USER->IsAuthorized())
	{
		$arResult["AUTHOR_NAME"] = $USER->GetFormattedName(false);
		$arResult["AUTHOR_PHONE"] = '';
	}
	else
	{
		if(strlen($_SESSION["MF_NAME"]) > 0)
			$arResult["AUTHOR_NAME"] = htmlspecialcharsbx($_SESSION["MF_NAME"]);
		if(strlen($_SESSION["MF_PHONE"]) > 0)
			$arResult["AUTHOR_PHONE"] = htmlspecialcharsbx($_SESSION["MF_PHONE"]);
        if(strlen($_SESSION["MF_PHONE"]) > 0)
            $arResult["AUTHOR_EMAIL"] = htmlspecialcharsbx($_SESSION["MF_EMAIL"]);
	}
}

$this->IncludeComponentTemplate();
