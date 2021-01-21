<?
define("STOP_STATISTICS", true);
define("PUBLIC_AJAX_MODE", true);
define("NOT_CHECK_PERMISSIONS", true);

use Bitrix\Sale;
use Bitrix\Main\Mail\Event;

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if (isset($_POST["AJAX"]) && $_POST["AJAX"] == "Y")
{
	if (!\Bitrix\Main\Loader::includeModule("ram.calc")) return;
	
	$DATA = $_POST;
	
	$arParams = Array("SERVICE_ID" => $DATA["SERVICE_ID"], "ELEMENT_ID" => $DATA["ELEMENT_ID"]);
	
	$arService = \CRamCalc::Data($arParams);
	
	if ($DATA["ACTION"] === "basket" && \Bitrix\Main\Loader::includeModule("sale"))
	{
		$basket = Sale\Basket::loadItemsForFUser(Sale\Fuser::getId(), Bitrix\Main\Context::getCurrent()->getSite());
		
		if (!empty($DATA["CALC"]))
		{
			foreach ($DATA["CALC"] as $calcID => $arCalc)
			{
				$arCalcProperties = Array();
				
				if (!empty($arService["PROPERTIES"]))
				{
					foreach ($arService["PROPERTIES"] as $arProperty)
					{
						if ($arProperty["TYPE"] === "number")
						{
							if (isset($arCalc["VALUES"][$arProperty["CODE"]]))
							{
								$arCalcProperties[] = Array
								(
									"NAME" => $arProperty["NAME"],
									"CODE" => "property_".$arProperty["CODE"],
									"VALUE" => $arCalc["VALUES"][$arProperty["CODE"]]
								);
							}
						}
						else if ($arProperty["TYPE"] === "list")
						{
							if ($arProperty["MULTYPLE"] === "Y")
							{
								$arValues = Array();
								if (!empty($arProperty["VALUES"]))
								{
									foreach ($arProperty["VALUES"] as $valueID => $arValue)
									{
										if (!empty($arCalc["VALUES"][$arProperty["CODE"]]) && in_array($valueID, $arCalc["VALUES"][$arProperty["CODE"]]))
										{
											$arValues[] = $arValue["TITLE"];
										}
									}
								}
								if (!empty($arValues))
								{
									$arCalcProperties[] = Array
									(
										"NAME" => $arProperty["NAME"],
										"CODE" => "property_".$arProperty["CODE"],
										"VALUE" => implode(", ", $arValues)
									);
								}
							}
							else
							{
								if (!empty($arProperty["VALUES"]))
								{
									foreach ($arProperty["VALUES"] as $valueID => $arValue)
									{
										if ($valueID == $arCalc["VALUES"][$arProperty["CODE"]])
										{
											$arCalcProperties[] = Array
											(
												"NAME" => $arProperty["NAME"],
												"CODE" => "property_".$arProperty["CODE"],
												"VALUE" => $arValue["TITLE"]
											);
										}
									}
								}
							}
						}
					}
				}
				
				if ($item = $basket->getExistsItem("catalog", $DATA["ELEMENT_ID"], $arCalcProperties))
				{
					$item->setField("QUANTITY", $item->getQuantity() + 1);
				}
				else
				{
					$item = $basket->createItem("catalog", $DATA["ELEMENT_ID"]);
					
					$res = $item->setFields(Array(
						"NAME" => $arService["SERVICE_PROPERTIES"]["SOURCE_NAME"],
						"QUANTITY" => 1,
						"CURRENCY" => Bitrix\Currency\CurrencyManager::getBaseCurrency(),
						"LID" => Bitrix\Main\Context::getCurrent()->getSite(),
						"PRICE" => $arCalc["CALCULATIONS"][intval($DATA["PRICE"])],
						"CUSTOM_PRICE" => "Y",
					));
					
					if (!empty($arCalcProperties))
					{
						$arCalcPropertiesCollection = $item->getPropertyCollection();
						$arCalcPropertiesCollection->setProperty($arCalcProperties);
					}
				}
			}
		}
		
		$res = $basket->save();
		
		if ($res->isSuccess()) echo("success");
		else echo("error");
	}
	else if ($DATA["ACTION"] === "request")
	{
		if (!strlen($DATA["REQUEST_EMAIL"]))
		{
			$dbSites = CSite::GetByID(Bitrix\Main\Context::getCurrent()->getSite());
			$arSite = $dbSites->Fetch();
			
			$DATA["REQUEST_EMAIL"] = $arSite["EMAIL"];
		}
		
		$strEventFields = "";
		
		if (!empty($DATA["FIELDS"]))
		{
			foreach ($DATA["FIELDS"] as $fieldName => $fieldValue)
			{
				$strEventFields .= $fieldName.": ".$fieldValue."\n";
			}
		}
		
		$strEventCalc = "";
		
		$calcNumber = 1;
		
		if (!empty($DATA["CALC"]))
		{
			foreach ($DATA["CALC"] as $calcID => $arCalc)
			{
				if (count($arCalc) > 1)
				{
					$strEventCalc .= $arService["SERVICE_PROPERTIES"]["SOURCE_NAME"]." #".($calcNumber++)."\n";
				}
				if (!empty($arService["PROPERTIES"]))
				{
					foreach ($arService["PROPERTIES"] as $arProperty)
					{
						$arPropertyValue = Array();
						if ($arProperty["TYPE"] === "number")
						{
							if (isset($arCalc["VALUES"][$arProperty["CODE"]]))
							{
								$arPropertyValue[] = $arCalc["VALUES"][$arProperty["CODE"]]." ".$arProperty["MEASURE"];
							}
						}
						else if ($arProperty["TYPE"] === "list")
						{
							if ($arProperty["MULTYPLE"] === "Y")
							{
								if (!empty($arProperty["VALUES"]))
								{
									foreach ($arProperty["VALUES"] as $valueID => $arValue)
									{
										if (!empty($arCalc["VALUES"][$arProperty["CODE"]]) && in_array($valueID, $arCalc["VALUES"][$arProperty["CODE"]]))
										{
											$arPropertyValue[] = $arValue["TITLE"];
										}
									}
								}
							}
							else
							{
								if (!empty($arProperty["VALUES"]))
								{
									foreach ($arProperty["VALUES"] as $valueID => $arValue)
									{
										if ($valueID == $arCalc["VALUES"][$arProperty["CODE"]])
										{
											$arPropertyValue[] = $arValue["TITLE"];
										}
									}
								}
							}
						}
						
						if (!empty($arPropertyValue))
						{
							$strEventCalc .= $arProperty["NAME"].": ".implode(", ", $arPropertyValue)."\n";
						}
					}
				}
				if (count($arCalc) > 1)
				{
					$strEventCalc .= "\n";
				}
			}
		}
		
		$res = Event::send(Array
		(
			"EVENT_NAME" => "RAM_CALC_REQUEST",
			"LID" => Bitrix\Main\Context::getCurrent()->getSite(),
			"C_FIELDS" => Array
			(
				"EMAIL" => $DATA["REQUEST_EMAIL"],
				"FIELDS" => $strEventFields,
				"CALC" => $strEventCalc,
			),
		));
		
		if ($res->getId()) echo("success");
		else echo("error");
	}
}
?>