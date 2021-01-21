<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

$this->setFrameMode(true);

if (!$arResult) return false;

if ($arParams["TEMPLATE_THEME"] === "other")
{
	$arParams["TEMPLATE_THEME"] = $arResult["ID"];
}

?><div class='ram-calc__calculator-wrap ram-calc__calculator_theme-<?=$arParams["TEMPLATE_THEME"]?>' data-calculator-wrap='<?=$arResult["ID"]?>'><?
if ($arParams["MULTYPLE"] === "Y")
{
	?><div class='ram-calc__calculator-tabs'>
		<div class='ram-calc__tab ram-calc__tab_active' data-index='1' onclick='return CRamCalc.SelectCalculator(this);'><?=$arResult["TITLE"]?> #1<div class='ram-calc__tab-delete' onclick='return CRamCalc.DeleteCalculator(this);'></div></div>
		<div class='ram-calc__tab' onclick='return CRamCalc.AddCalculator(this, "<?=$arResult["ID"]?>");'><?=GetMessage("RAM_CALC_ADD")?></div>
	</div><?
}
?><div class='ram-calc__calculator' data-calculator='<?=$arResult["ID"]?>'><?
if ($arParams["MULTYPLE"] !== "Y")
{
	?><div class='ram-calc__calculator-title'><?=$arResult["TITLE"]?></div><?
}
?><form><div class='ram-calc__calculator-properties'><?
foreach ($arResult["PROPERTIES"] as $arProperty)
{
	if ($arProperty["CODE"] === "base") continue;
	$propertyDisplay = $arParams["PROPERTY_".$arProperty["CODE"]."_DISPLAY"];
	
	?><div class='ram-calc__property' data-property='<?=$arProperty["CODE"]?>'><div class='ram-calc__property-title'><?=$arProperty["TITLE"]?></div><?
	if (strlen($arProperty["HINT"]))
	{
		?><div class='ram-calc__property-hint'><?=$arProperty["HINT"]?></div><?
	}
	if ($arProperty["TYPE"] === "list")
	{
		if (!$propertyDisplay) $propertyDisplay = "select";
		?><div class='ram-calc__property-list ram-calc__property-list_<?=$propertyDisplay?>'><?
		if ($propertyDisplay === "items")
		{
			foreach ($arProperty["VALUES"] as $valueID => $arValue)
			{
				if ($arValue["ACTIVE"] !== "Y") continue;
				
				$checked = $arValue["CHECKED"] ? "checked='checked'" : "";
				
				if ($arParams["PROPERTY_".$arProperty["CODE"]."_IMAGES"] === "Y")
				{
					$arImage = CFile::ResizeImageGet($arValue["PICTURE"], array("width" => 60, "height" => 60), BX_RESIZE_IMAGE_PROPORTIONAL, true);
					?><label class='ram-calc__value ram-calc__value_image'><?
					if ($arProperty["MULTYPLE"] === "Y")
					{
						?><input <?=$checked?> onchange='return CRamCalc.OnListItemClick(this);' type='checkbox' name='<?=$arProperty["FIELD_NAME"]?>' value='<?=$valueID?>'/><?
					}
					else
					{
						?><input <?=$checked?> onchange='return CRamCalc.OnListItemClick(this);' type='radio' name='<?=$arProperty["FIELD_NAME"]?>' value='<?=$valueID?>'/><?
					}
					?><div class='ram-calc__value-image' title='<?=$arValue["TITLE"]?>'><img src='<?=$arImage["src"]?>'/></div></label><?
				}
				else
				{
					?><label class='ram-calc__value ram-calc__value_noimage'><?
					if ($arProperty["MULTYPLE"] === "Y")
					{
						?><input <?=$checked?> onchange='return CRamCalc.OnListItemClick(this);' type='checkbox' name='<?=$arProperty["FIELD_NAME"]?>' value='<?=$valueID?>'/><?
					}
					else
					{
						?><input <?=$checked?> onchange='return CRamCalc.OnListItemClick(this);' type='radio' name='<?=$arProperty["FIELD_NAME"]?>' value='<?=$valueID?>'/><?
					}
					?><div class='ram-calc__value-title'><?=$arValue["TITLE"]?></div><?
					if (strlen($arValue["HINT"]) && $arParams["PROPERTY_".$arProperty["CODE"]."_HINTS"] === "Y")
					{
						?><div class='ram-calc__value-hint'><?=$arValue["HINT"]?></div><?
					}
					?></label><?
				}
			}
		}
		else
		{
			?><select onchange='CRamCalc.OnSelectChange(this);' <?=$arProperty["MULTYPLE"] === "Y" ? "multiple='multiple'" : ""?> name='<?=$arProperty["FIELD_NAME"]?>'><?
			foreach ($arProperty["VALUES"] as $valueID => $arValue)
			{
				if ($arValue["ACTIVE"] !== "Y") continue;
				
				$selected = $arValue["CHECKED"] ? "selected='selected'" : "";
				
				?><option <?=$selected?> value="<?=$valueID?>"><?=$arValue["TITLE"]?></option><?
			}
			?></select><?
		}
		?></div><?
	}
	else if ($arProperty["TYPE"] === "number")
	{
		if ($propertyDisplay === "range")
		{
			?><div class='ram-calc__property-range'><div class='ram-calc__range'><input oninput='CRamCalc.OnRangeSliderMove(this);' onchange='CRamCalc.OnRangeSliderChange(this);' type='range' name='<?=$arProperty["FIELD_NAME"]?>' value='<?=$arProperty["NUMBER_VALUE"]?>' min='<?=$arProperty["NUMBER_MIN"]?>' max='<?=$arProperty["NUMBER_MAX"]?>' step='<?=$arProperty["NUMBER_STEP"]?>'/><div class='ram-calc__range-min'><?=$arProperty["NUMBER_MIN"]?></div><div class='ram-calc__range-max'><?=$arProperty["NUMBER_MAX"]?></div><input onchange='CRamCalc.OnRangeInputChange(this);' type='text' class='ram-calc__range-value' value='<?=$arProperty["NUMBER_VALUE"]?>'/> <?=$arProperty["MEASURE"]?></div></div><?
		}
		else
		{
			?><div class='ram-calc__property-number'><input type='text' onchange='CRamCalc.OnNumberChange(this);' value='<?=$arProperty["NUMBER_VALUE"]?>' name='<?=$arProperty["FIELD_NAME"]?>' min='<?=$arProperty["NUMBER_MIN"]?>' max='<?=$arProperty["NUMBER_MAX"]?>' step='<?=$arProperty["NUMBER_STEP"]?>'/> <?=$arProperty["MEASURE"]?></div><?
		}
	}
	?></div><?
}
?></div><?
if (!empty($arResult["CALCULATIONS"]))
{
	?><div class='ram-calc__calculator-calculations'><?
	foreach ($arResult["CALCULATIONS"] as $calculationID => $arCalculation)
	{
		?><div class='ram-calc__calculation'><div class='ram-calc__calculation-title'><?=$arCalculation["NAME"]?>:</div><div class='ram-calc__calculation-result' data-calculation='<?=$arCalculation["CODE"]?>'>0</div><div class='ram-calc__calculation-measure'><?=$arCalculation["MEASURE"]?></div></div><?
	}
	?></div><?
}
?></form></div><?
if ($arParams["MULTYPLE"] === "Y")
{
	if (!empty($arResult["CALCULATIONS"]))
	{
		?><div class='ram-calc__calculator-total-calculations'><div class='ram-calc__calculations-title'><?=GetMessage("RAM_CALC_TOTAL_CALCULATIONS")?></div><?
		foreach ($arResult["CALCULATIONS"] as $calculationID => $arCalculation)
		{
			if (!empty($arParams["HIDDEN_CALCULATIONS"]) && in_array($arCalculation["CODE"], $arParams["HIDDEN_CALCULATIONS"])) continue;
			
			?><div class='ram-calc__calculation'><div class='ram-calc__calculation-title'><?=$arCalculation["NAME"]?>:</div><div class='ram-calc__calculation-result' data-calculation='<?=$arCalculation["CODE"]?>'>0</div><div class='ram-calc__calculation-measure'><?=$arCalculation["MEASURE"]?></div></div><?
		}
		?></div><?
	}
}
if ($arParams["ACTION"] === "basket")
{
	?><div class='ram-calc__request'><div class='ram-calc__request-submit'><input onclick='CRamCalc.Submit(this);' type='button' value='<?=$arParams["REQUEST_BASKET_BTN"]?>' /></div></div><?
}
else if ($arParams["ACTION"] === "request")
{
	?><div class='ram-calc__request' id='request-<?=$arResult["ID"]?>'><?
	if (strlen($arParams["REQUEST_DESCRIPTION"]))
	{
		?><div class='ram-calc__request-description'><?=$arParams["REQUEST_DESCRIPTION"]?></div><?
	}
	foreach ($arParams["REQUEST_FIELDS"] as $k => $userField)
	{
		?><div class='ram-calc__request-field'><input type='text' placeholder='<?=trim($userField)?>' data-index='<?=$k?>' name='requestFields[]' /></div><?
	}
	?><div data-consent-place='<?=$arResult["ID"]?>'></div><div class='ram-calc__request-submit'><input onclick='CRamCalc.Submit(this);' type='button' value='<?=$arParams["REQUEST_BTN"]?>' /></div></div><?
}
?></div>
<script type='text/javascript'>
CRamCalc.AddData(
{
	id: "<?=$arResult["ID"]?>",
	title: "<?=$arResult["TITLE"]?>",
	conditions: <?=CUtil::PhpToJSObject($arResult["CONDITIONS"])?>,
	calculations: <?=CUtil::PhpToJSObject($arResult["CALCULATIONS"])?>,
	properties: <?=CUtil::PhpToJSObject($arResult["PROPERTIES"])?>,
	multyple: <?=($arParams["MULTYPLE"] === "Y" ? "true" : "false")?>,
	params: "<?=base64_encode(json_encode(Array("AJAX_URL" => $componentPath."/ajax.php", "AJAX" => "Y", "ACTION" => $arParams["ACTION"], "REQUEST_EMAIL" => $arParams["REQUEST_EMAIL"], "ELEMENT_ID" => $arParams["ELEMENT_ID"], "SERVICE_ID" => $arParams["SERVICE_ID"], "PRICE" => $arParams["PRICE"])))?>"
});
BX.message({"CONFIRM_CALCULATOR_DELETE": "<?=GetMessage("RAM_CALC_CONFIRM_CALCULATOR_DELETE")?>"});
<?
if ($arParams["ACTION"] === "request")
{
	?>CRamCalc.InitPopup({id: "<?=$arResult["ID"]?>", theme: "<?=$arParams["TEMPLATE_THEME"]?>", successMessage: "<?=htmlspecialchars_decode($arParams["REQUEST_SUCCESS"])?>", failMessage: "<?=htmlspecialchars_decode($arParams["REQUEST_FAIL"])?>"});<?
}
else if ($arParams["ACTION"] === "basket")
{
	?>CRamCalc.InitPopup({id: "<?=$arResult["ID"]?>", theme: "<?=$arParams["TEMPLATE_THEME"]?>", successMessage: "<?=htmlspecialchars_decode($arParams["REQUEST_BASKET_SUCCESS"])?>", failMessage: "<?=htmlspecialchars_decode($arParams["REQUEST_BASKET_FAIL"])?>"});<?
}
?>
</script>
<?
if ($arParams["TEMPLATE_THEME"] === $arResult["ID"] && $arParams["COLOR"])
{
	?><style type='text/css'>
		.ram-calc__calculator_theme-<?=$arResult["ID"]?> .ram-calc__tab_active {background-color: <?=$arParams["COLOR"]?>;}
		.ram-calc__calculator_theme-<?=$arResult["ID"]?> .ram-calc__calculation-result {color: <?=$arParams["COLOR"]?>;}
		.ram-calc__calculator_theme-<?=$arResult["ID"]?> .ram-calc__value_noimage input + .ram-calc__value-title:before {border-color: <?=$arParams["COLOR"]?>;}
		.ram-calc__calculator_theme-<?=$arResult["ID"]?> .ram-calc__value_noimage input[type=checkbox] + .ram-calc__value-title:after {border-color: <?=$arParams["COLOR"]?>;}
		.ram-calc__calculator_theme-<?=$arResult["ID"]?> .ram-calc__value_noimage input[type=radio] + .ram-calc__value-title:after {background-color: <?=$arParams["COLOR"]?>;}
		.ram-calc__calculator_theme-<?=$arResult["ID"]?> .ram-calc__value_image input:checked + .ram-calc__value-image {border-color: <?=$arParams["COLOR"]?>;}
		.ram-calc__calculator_theme-<?=$arResult["ID"]?> .ram-calc__range input[type=range]::-webkit-slider-thumb {border-color: <?=$arParams["COLOR"]?>;}
		.ram-calc__calculator_theme-<?=$arResult["ID"]?> .ram-calc__range input[type=range]::-moz-range-thumb {border-color: <?=$arParams["COLOR"]?>;}
		.ram-calc__calculator_theme-<?=$arResult["ID"]?> .ram-calc__range input[type=range]::-ms-thumb {border-color: <?=$arParams["COLOR"]?>;}
		.ram-calc__calculator_theme-<?=$arResult["ID"]?> .ram-calc__request-submit input[type='button'] {background-color: <?=$arParams["COLOR"]?>;}
		.ram-calc__calculator_theme-<?=$arResult["ID"]?> .ram-calc__request-consent input[type='checkbox'] + a:before {border-color: <?=$arParams["COLOR"]?>;}
		.ram-calc__calculator_theme-<?=$arResult["ID"]?> .ram-calc__request-consent input[type='checkbox'] + a:after {border-color: <?=$arParams["COLOR"]?>;}
		.ram-calc__popup-<?=$arResult["ID"]?> a {background-color: <?=$arParams["COLOR"]?>;}
	</style><?
}
?>