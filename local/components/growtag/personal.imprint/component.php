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

if($USER->IsAuthorized()){
    $arFilter = array("ID" => $USER->GetID());
    $rsUser = CUser::GetList(($by="ID"), ($order="ASC"), $arFilter, $arParams);
    $arUser = $rsUser->Fetch();

    if (!empty($arUser["UF_IMPRINT"])){
        $arResult["USER_IMPRINT"] = $arUser["UF_IMPRINT"];
    } else {
        $arResult["USER_IMPRINT"] = 0;
    }

    $arSelect = Array("ID", "NAME", "PROPERTY_WIDGET_TEXT", "PROPERTY_TO", "PROPERTY_FROM", "PROPERTY_DISCOUNT");
    $arFilter = Array(
        "IBLOCK_ID"=>IntVal($arParams["DISCOUNT_IBLOCK_ID"]),
        "ACTIVE_DATE"=>"Y",
        "ACTIVE"=>"Y",
    );
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
        if($arFields['PROPERTY_FROM_VALUE'] <= $arResult["USER_IMPRINT"] && ($arFields['PROPERTY_TO_VALUE'] > $arResult["USER_IMPRINT"] || $arFields['PROPERTY_TO_VALUE'] == 0)){
            $arResult["TEXT"] = str_ireplace("#TO_IMPRINT#", IntVal($arFields['PROPERTY_TO_VALUE']-$arResult["USER_IMPRINT"]), str_ireplace("#IMPRINT#", $arResult["USER_IMPRINT"], $arFields['PROPERTY_WIDGET_TEXT_VALUE']['TEXT']));
        }
    }
}

$this->IncludeComponentTemplate();
