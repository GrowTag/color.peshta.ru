<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
if (!\Bitrix\Main\Loader::includeModule("ram.calc")) return;
$arServices = Array("0" => GetMessage("RAM_CALC_NOT_SELECTED"));
$dbServices = \Ram\Calc\ServiceTable::getList(Array("order" => Array("ID" => "asc"), "select" => Array("ID", "NAME")));
while ($arService = $dbServices -> fetch())
{
	$arServices[$arService["ID"]] = $arService["NAME"];
}
$arActionValues = Array
(
	"calc" => GetMessage("RAM_CALC_ACTION_CALC"),
	"request" => GetMessage("RAM_CALC_ACTION_REQUEST")
);
if (!$arCurrentValues["SERVICE_ID"])
{
	foreach ($arServices as $serviceId => $arService)
	{
		$arCurrentValues["SERVICE_ID"] = $serviceId;
		break;
	}
}
$arComponentParameters["PARAMETERS"]["SERVICE_ID"] = Array
(
	"PARENT" => "BASE",
	"NAME" => GetMessage("RAM_CALC_SERVICE_ID"),
	"TYPE" => "LIST",
	"VALUES" => $arServices,
	"REFRESH" => "Y",
);
if ($arCurrentValues["SERVICE_ID"])
{
	$arService = \Ram\Calc\ServiceTable::getRowById($arCurrentValues["SERVICE_ID"]);
	if ($arService["PROPERTIES"]["SOURCE"] !== "manual")
	{
		$arComponentParameters["PARAMETERS"]["ELEMENT_ID"] = Array
		(
			"PARENT" => "BASE",
			"NAME" => GetMessage("RAM_CALC_ELEMENT_ID"),
			"TYPE" => "STRING",
			"DEFAULT" => '={$_REQUEST["ELEMENT_ID"]}',
		);
	}
	$arComponentParameters["PARAMETERS"]["MULTYPLE"] = Array
	(
		"PARENT" => "BASE",
		"NAME" => GetMessage("RAM_CALC_MULTYPLE"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "N",
	);
	$arComponentParameters["PARAMETERS"]["JQUERY"] = Array
	(
		"PARENT" => "BASE",
		"NAME" => GetMessage("RAM_CALC_JQUERY"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	);

	if ($arService["PROPERTIES"]["SOURCE"] === "iblock" && \Bitrix\Main\Loader::includeModule("sale"))
	{
		$arActionValues["basket"] = GetMessage("RAM_CALC_ACTION_BASKET");
	}
	else
	{
		if ($arCurrentValues["ACTION"] === "basket")
		{
			$arCurrentValues["ACTION"] = "calc";
		}
	}
	$arComponentParameters["PARAMETERS"]["ACTION"] = Array
	(
		"PARENT" => "BASE",
		"NAME" => GetMessage("RAM_CALC_ACTION"),
		"TYPE" => "LIST",
		"VALUES" => $arActionValues,
		"DEFAULT" => "calc",
		"REFRESH" => "Y",
	);

	if ($arCurrentValues["ACTION"] === "request")
	{
		$dbSites = CSite::GetByID(SITE_ID);
		$arSite = $dbSites->Fetch();
		
		$arComponentParameters["PARAMETERS"]["USER_CONSENT"] = Array();
		$arComponentParameters["PARAMETERS"]["REQUEST_FIELDS"] = Array
		(
			"PARENT" => "BASE",
			"NAME" => GetMessage("RAM_CALC_REQUEST_FIELDS"),
			"TYPE" => "STRING",
			"DEFAULT" => Array(GetMessage("RAM_CALC_REQUEST_FIELDS_DEFAULT")),
			"MULTIPLE" => "Y",
		);
		$arComponentParameters["PARAMETERS"]["REQUEST_EMAIL"] = Array
		(
			"PARENT" => "BASE",
			"NAME" => "E-mail ".GetMessage("RAM_CALC_REQUEST_EMAIL"),
			"TYPE" => "STRING",
			"DEFAULT" => $arSite["EMAIL"],
		);
		$arComponentParameters["PARAMETERS"]["REQUEST_DESCRIPTION"] = Array
		(
			"PARENT" => "BASE",
			"NAME" => GetMessage("RAM_CALC_REQUEST_DESCRIPTION"),
			"TYPE" => "STRING",
			"DEFAULT" => GetMessage("RAM_CALC_REQUEST_DESCRIPTION_DEFAULT"),
		);
		$arComponentParameters["PARAMETERS"]["REQUEST_BTN"] = Array
		(
			"PARENT" => "BASE",
			"NAME" => GetMessage("RAM_CALC_REQUEST_BTN"),
			"TYPE" => "STRING",
			"DEFAULT" => GetMessage("RAM_CALC_REQUEST_BTN_DEFAULT"),
		);
		$arComponentParameters["PARAMETERS"]["REQUEST_SUCCESS"] = Array
		(
			"PARENT" => "BASE",
			"NAME" => GetMessage("RAM_CALC_REQUEST_SUCCESS"),
			"TYPE" => "STRING",
			"DEFAULT" => GetMessage("RAM_CALC_REQUEST_SUCCESS_DEFAULT"),
		);
		$arComponentParameters["PARAMETERS"]["REQUEST_FAIL"] = Array
		(
			"PARENT" => "BASE",
			"NAME" => GetMessage("RAM_CALC_REQUEST_FAIL"),
			"TYPE" => "STRING",
			"DEFAULT" => GetMessage("RAM_CALC_REQUEST_FAIL_DEFAULT"),
		);
	}
	else if ($arCurrentValues["ACTION"] === "basket")
	{
		$arPrices = Array();
		foreach ($arService["CALCULATIONS"] as $k => $arCalculation)
		{
			$arPrices[$k] = $arCalculation["NAME"];
		}
		$arComponentParameters["PARAMETERS"]["PRICE"] = Array
		(
			"PARENT" => "BASE",
			"NAME" => GetMessage("RAM_CALC_PRICE"),
			"TYPE" => "LIST",
			"VALUES" => $arPrices,
		);
		$arComponentParameters["PARAMETERS"]["REQUEST_BASKET_BTN"] = Array
		(
			"PARENT" => "BASE",
			"NAME" => GetMessage("RAM_CALC_REQUEST_BTN"),
			"TYPE" => "STRING",
			"DEFAULT" => GetMessage("RAM_CALC_REQUEST_BASKET_BTN_DEFAULT"),
		);
		$arComponentParameters["PARAMETERS"]["REQUEST_BASKET_SUCCESS"] = Array
		(
			"PARENT" => "BASE",
			"NAME" => GetMessage("RAM_CALC_REQUEST_BASKET_SUCCESS"),
			"TYPE" => "STRING",
			"DEFAULT" => GetMessage("RAM_CALC_REQUEST_BASKET_SUCCESS_DEFAULT")."</a>.",
		);
		$arComponentParameters["PARAMETERS"]["REQUEST_BASKET_FAIL"] = Array
		(
			"PARENT" => "BASE",
			"NAME" => GetMessage("RAM_CALC_REQUEST_BASKET_FAIL"),
			"TYPE" => "STRING",
			"DEFAULT" => GetMessage("RAM_CALC_REQUEST_BASKET_FAIL_DEFAULT"),
		);
	}
	$arComponentParameters["PARAMETERS"]["TEMPLATE_THEME"] = Array
	(
		"PARENT" => "VISUAL",
		"NAME" => GetMessage("RAM_CALC_TEMPLATE_THEME"),
		"TYPE" => "LIST",
		"VALUES" => Array
		(
			"blue" => GetMessage("RAM_CALC_TEMPLATE_THEME_BLUE"),
			"green" => GetMessage("RAM_CALC_TEMPLATE_THEME_GREEN"),
			"red" => GetMessage("RAM_CALC_TEMPLATE_THEME_RED"),
			"yellow" => GetMessage("RAM_CALC_TEMPLATE_THEME_YELLOW"),
			"other" => GetMessage("RAM_CALC_TEMPLATE_THEME_OTHER"),
		),
		"DEFAULT" => "blue",
		"REFRESH" => "Y",
	);
	if ($arCurrentValues["TEMPLATE_THEME"] === "other")
	{
		$arComponentParameters["PARAMETERS"]["COLOR"]  = Array
		(
			"PARENT" => "VISUAL",
			"NAME" => GetMessage("RAM_CALC_COLOR"),
			"TYPE" => "COLORPICKER",
			"DEFAULT" => "FFFF00"
		);
	}
	$arComponentParameters["PARAMETERS"]["CACHE_TIME"] = Array
	(
		"DEFAULT" => 36000000
	);
	$arProperties = Array();
	$dbProperties = \Ram\Calc\PropertyTable::getList(Array("filter" => Array("=SERVICE_ID" => $arCurrentValues["SERVICE_ID"])));
	while ($arProperty = $dbProperties -> fetch())
	{
		$arProperties[] = $arProperty;
	}
	usort($arProperties, function($a, $b){return $a["PARAMETERS"]["SORT"] - $b["PARAMETERS"]["SORT"];});
	foreach ($arProperties as $k => $arProperty)
	{
		$code = $arProperty["PROPERTIES"]["CODE"];
		$arComponentParameters["GROUPS"]["PROPERTY_".$code] = Array
		(
			"NAME" => GetMessage("RAM_CALC_PROPERTY")." \"".$arProperty["PROPERTIES"]["NAME"]."\"",
			"SORT" => 410+$arProperty["PROPERTIES"]["SORT"],
		);
		if ($arProperty["PROPERTIES"]["TYPE"] === "list")
		{
			$arComponentParameters["PARAMETERS"]["PROPERTY_".$code."_DISPLAY"] = Array
			(
				"PARENT" => "PROPERTY_".$code,
				"NAME" => GetMessage("RAM_CALC_PROPERTY_DISPLAY"),
				"TYPE" => "LIST",
				"VALUES" => Array("select" => GetMessage("RAM_CALC_PROPERTY_SELECT"), "items" => GetMessage("RAM_CALC_PROPERTY_LIST")),
				"DEFAULT" => "select",
				"REFRESH" => "Y",
			);
			if ($arCurrentValues["PROPERTY_".$code."_DISPLAY"] === "items")
			{
				$arComponentParameters["PARAMETERS"]["PROPERTY_".$code."_IMAGES"] = Array
				(
					"PARENT" => "PROPERTY_".$code,
					"NAME" => GetMessage("RAM_CALC_PROPERTY_IMAGES"),
					"TYPE" => "CHECKBOX",
					"DEFAULT" => "N",
					"REFRESH" => "Y",
				);
				if ($arCurrentValues["PROPERTY_".$code."_IMAGES"] !== "Y")
				{
					$arComponentParameters["PARAMETERS"]["PROPERTY_".$code."_HINTS"] = Array
					(
						"PARENT" => "PROPERTY_".$code,
						"NAME" => GetMessage("RAM_CALC_PROPERTY_HINTS"),
						"TYPE" => "CHECKBOX",
						"DEFAULT" => "Y",
					);
				}
			}
		}
		else
		{
			$arComponentParameters["PARAMETERS"]["PROPERTY_".$code."_DISPLAY"] = Array
			(
				"PARENT" => "PROPERTY_".$code,
				"NAME" => GetMessage("RAM_CALC_PROPERTY_DISPLAY"),
				"TYPE" => "LIST",
				"VALUES" => Array("input" => GetMessage("RAM_CALC_PROPERTY_INPUT"), "range" => GetMessage("RAM_CALC_PROPERTY_RANGE")),
				"DEFAULT" => "input",
			);
		}
	}
	
	$arCalculations = Array();
	foreach ($arService["CALCULATIONS"] as $arCalculation)
	{
		$arCalculations[$arCalculation["CODE"]] = $arCalculation["NAME"];
	}
	
	$arComponentParameters["PARAMETERS"]["HIDDEN_CALCULATIONS"] = Array
	(
		"PARENT" => "BASE",
		"NAME" => GetMessage("RAM_CALC_HIDDEN_CALCULATIONS"),
		"TYPE" => "LIST",
		"VALUES" => $arCalculations,
		"MULTIPLE" => "Y",
	);
}
?>