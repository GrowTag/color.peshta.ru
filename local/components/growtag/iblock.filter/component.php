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

$arResult["PARAMS_HASH"] = md5(serialize($arParams).$this->GetTemplateName());

if($_SERVER["REQUEST_METHOD"] == "GET" && (!isset($_GET["PARAMS_HASH"]) || $arResult["PARAMS_HASH"] === $_GET["PARAMS_HASH"])){

    $arResult["ERROR_MESSAGE"] = array();

    if(check_bitrix_sessid()) {
        if(isset($_REQUEST["arrFilter"])){
            $GLOBALS['arrFilter'] = Array("");
            switch ($_REQUEST["arrFilter"]){
                case "MONTH":
                    $GLOBALS['arrFilter'] = Array(">=DATE_CREATE" => date('01.m.Y'), "<=DATE_CREATE" => date('t.m.Y'));
                    break;
                case "YEAR":
                    $GLOBALS['arrFilter'] = Array(">=DATE_CREATE" => date('01.01.Y'), "<=DATE_CREATE" => date('31.12.Y'));
                    break;
                case "ALL":
                    $GLOBALS['arrFilter'] = Array("");
                    break;
            }
        }
    } else {
        $arResult["ERROR_MESSAGE"][] = GetMessage("MF_SESS_EXP");
    }
} elseif($_REQUEST["success"] == $arResult["PARAMS_HASH"]) {
    $arResult["OK_MESSAGE"] = $arParams["OK_TEXT"];
}

$this->IncludeComponentTemplate();
