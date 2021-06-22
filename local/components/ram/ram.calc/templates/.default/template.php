<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

global $USER;

$this->setFrameMode(true);

if (!$arResult) return false;

if ($arParams["TEMPLATE_THEME"] === "other")
{
	$arParams["TEMPLATE_THEME"] = $arResult["ID"];
}

?>
<!------------------ MODAL ORDER ----------------->
<div class="modal fade" id="modalOrderPopup" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ваш заказ успешно сформирован!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-content-body d-flex justify-content-center align-items-center mt-4 mb-4 ml-5 mr-5">
            </div>
            <div class="d-flex ml-5 mr-5 mb-5">
                <a href="/catalog/" class="red-button form-button">Перейти в каталог</a>
                <a href="/personal/" class="red-button form-button">Личный кабинет</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalOrderPopupNotAuth" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Вы не авторизованы!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-content-body d-flex justify-content-center align-items-center mt-4 mb-4 ml-5 mr-5">
            </div>
            <div class="d-flex ml-5 mr-5 mb-5">
                <a href="/personal/" class="red-button form-button">Вход</a>
                <a href="/personal/?register=yes" class="red-button form-button">Регистрация</a>
            </div>
        </div>
    </div>
</div>
<!-------------------------------------------------------------------------------------------------------------->

<div class='ram-calc__calculator-wrap ram-calc__calculator_theme-<?=$arParams["TEMPLATE_THEME"]?>' data-calculator-wrap='<?=$arResult["ID"]?>'>
    <div class='ram-calc__calculator' id="<?=$_REQUEST["ID"];?>" data-calculator='<?=$arResult["ID"]?>'>
    <div class="catalog-section-detail-order">
    <div class="row justify-content-center" id="order-calc-form">
        <h2>
            <?
if ($arParams["MULTYPLE"] !== "Y")
{
	?><div class='ram-calc__calculator-title'><?=$arResult["TITLE"]?></div><?
}?>
        </h2>
    </div>
    <div class="container">
        <div class="row">
    <div class="catalog-detail-section-order__form">
        <form action="<?=POST_FORM_ACTION_URI?>" method="POST" id="order-form" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8 col-sm-12 form__left">
                <?if ($arParams["MULTYPLE"] === "Y") {
                    ?><div class='ram-calc__calculator-tabs'>
                    <div class='ram-calc__tab ram-calc__tab_active' data-index='1' onclick='return CRamCalc.SelectCalculator(this);'><?=$arResult["TITLE"]?> #1<div class='ram-calc__tab-delete' onclick='return CRamCalc.DeleteCalculator(this);'></div></div>
                    <div class='ram-calc__tab' onclick='return CRamCalc.AddCalculator(this, "<?=$arResult["ID"]?>");'><?=GetMessage("RAM_CALC_ADD")?></div>
                    </div><?
                }
                ?>
                <div class='ram-calc__calculator-properties'><?
                    foreach ($arResult["PROPERTIES"] as $arProperty)
                    {
                        if ($arProperty["CODE"] === "base") continue;
                        $propertyDisplay = $arParams["PROPERTY_".$arProperty["CODE"]."_DISPLAY"];

                        ?><div class='ram-calc__property' data-property='<?=$arProperty["CODE"]?>'><div class='ram-calc__property-title'><?=$arProperty["TITLE"]?></div><?
                        if (strlen($arProperty["HINT"]))
                        {
                            ?><div class='ram-calc__property-hint'><?=str_replace("#RADIO#", "", $arProperty["HINT"]);?></div><?
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
                                /*
                                    $arProperty["NAME"] == "Размер" or
                                    $arProperty["NAME"] == "Стороны" or
                                    $arProperty["NAME"] == "Тираж" or
                                    $arProperty["NAME"] == "Макет" or
                                    $arProperty["NAME"] == "Тип товара"
                                 */
                                if(strpos($arProperty["HINT"], "#RADIO#") !== false){
                                    foreach ($arProperty["VALUES"] as $valueID => $arValue)
                                    {
                                        if ($arValue["ACTIVE"] !== "Y") continue;

                                        $checked = $arValue["CHECKED"] ? "checked='checked'" : "";

                                        ?><label for="<?=$arProperty["FIELD_NAME"]."_".$valueID;?>">
                                        <input data-price="<?=$arValue["PRICE"];?>" <?=$checked?> id="<?=$arProperty["FIELD_NAME"]."_".$valueID;?>" onchange='return CRamCalc.OnListItemClick(this);' type='radio' name='<?=$arProperty["FIELD_NAME"]?>' value='<?=$valueID?>' data-name="<?if(!empty($arProperty["TITLE"])):?> <?=$arProperty["TITLE"]?><?else:?><?=$arProperty["NAME"];?><?endif;?>: <?=$arValue["TITLE"]?>" <?if($arProperty["NAME"] == "Тираж"):?> data-quantity="<?=$arValue["TITLE"]?>"<?endif;?>/>&nbsp;<?=$arValue["TITLE"]?>
                                        </label>
                                        <?
                                    }
                                } else {?>
                                    <select onchange='CRamCalc.OnSelectChange(this);' <?=$arProperty["MULTYPLE"] === "Y" ? "multiple='multiple'" : ""?> name='<?=$arProperty["FIELD_NAME"]?>'><?
                                        foreach ($arProperty["VALUES"] as $valueID => $arValue)
                                        {
                                            if ($arValue["ACTIVE"] !== "Y") continue;

                                            $selected = $arValue["CHECKED"] ? "selected='selected'" : "";

                                            ?><option data-price="<?=$arValue["PRICE"];?>" id="<?=$arProperty["FIELD_NAME"]?>_<?=$valueID?>" <?=$selected?> value="<?=$valueID?>" data-name="<?if(!empty($arProperty["TITLE"])):?> <?=$arProperty["TITLE"]?><?else:?><?=$arProperty["NAME"];?><?endif;?>: <?=$arValue["TITLE"]?>" <?if($arProperty["NAME"] == "Тираж"):?> data-quantity="<?=$arValue["TITLE"]?>"<?endif;?>><?=$arValue["TITLE"]?></option><?
                                        }
                                        ?></select>
                                <?}
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
                        ?></div>
                        <?
                    }
                    ?>
                    <?if($arParams["SERVICE_ID"]["VALUE"]!=3):?>
                        <form action="<?=POST_FORM_ACTION_URI?>" method="POST" id="order-download-form" enctype="multipart/form-data">
                            <div class="box file-hidden">
                                <input type="file" name="file" id="file" class="inputfile inputfile-6" hidden onchange="CRamCalc.DownloadFile(this);">
                                <label for="file">
                                    <strong>
                                        Прикрепить макет
                                    </strong>
                                    <span></span>
                                </label>
                            </div>
                        </form>
                    <?endif;?>
                </div>
            </div>
            <div class="form__right col-md-4 col-sm-12 d-flex flex-column">
                <div class="form__right-top d-flex justify-content-center">Ничего не выбрано</div>
                <div class="form__right-center d-flex align-self-center justify-content-center">
                    <?
                    if (!empty($arResult["CALCULATIONS"]))
                    {
                        ?><div class='ram-calc__calculator-calculations'><?
                        foreach ($arResult["CALCULATIONS"] as $calculationID => $arCalculation)
                        {
                            ?>
                            <div class='ram-calc__calculation-title'><?=$arCalculation["NAME"]?>:</div>
                            <div class='ram-calc__calculation'>
                                <div class='ram-calc__calculation-result' data-calculation='<?=$arCalculation["CODE"]?>'>0</div>
                                <div class='ram-calc__calculation-measure'><?=$arCalculation["MEASURE"]?></div>
                            </div><?
                        }
                        ?></div><?
                    }
                    ?>
                </div>
                <div class="form__right-bottom d-flex justify-content-center">
                    <input type="hidden" id="USE_IMPRINT" name="USE_IMPRINT" value="<?=$arParams["USE_IMPRINT"];?>">
                    <input type="hidden" id="USER_ID" name="USER_ID" value="<?=$USER->GetID();?>">
                    <input type="hidden" id="PRODUCT_NAME" name="PRODUCT_NAME" value="<?=$arParams["PRODUCT_NAME"]?>">
                    <input type="hidden" id="PRODUCT_ID" name="PRODUCT_ID" value="<?=$arParams["PRODUCT_ID"]?>">
                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse-modal">
                    <input type="hidden" id="PARAMS_HASH" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
                    <input type="hidden" id="FILES" name="FILES"  value="">
                    <input type="hidden" id="QUANTITY" name="QUANTITY" value="">
                    <input title="Нажимая 'Заказать' вы соглашаетесь с политикой конфиденциальности." <?if(strlen($arResult["OK_MESSAGE"]) > 0 || isset($_GET['success'])):?>disabled<?endif;?> type="button" onclick='CRamCalc.SubmitCalc();' value="Заказать" class="red-button"/>
                </div>
            </div>
        </div>
        </form>
    </div>
        </div>
        <?
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
        ?>
    </div>
</div>
    </div>
</div>
<script type='text/javascript'>
    ;(function (document, window, index){
        'use strict';
        var inputs = document.querySelectorAll('.inputfile');
        Array.prototype.forEach.call(inputs, function (input) {
            var label = input.nextElementSibling,
                labelVal = label.innerHTML;

            input.addEventListener('change', function (e) {
                var fileName = '';
                if (this.files && this.files.length > 1)
                    fileName = ( this.getAttribute('data-multiple-caption') || '' ).replace('{count}', this.files.length);
                else
                    fileName = e.target.value.split('\\').pop();

                if (fileName)
                    label.querySelector('span').innerHTML = fileName;
                else
                    label.innerHTML = labelVal;
            });

            // Firefox bug fix
            input.addEventListener('focus', function () {
                input.classList.add('has-focus');
            });
            input.addEventListener('blur', function () {
                input.classList.remove('has-focus');
            });
        });
    }(document, window, 0));
    $(document).ready(function() {
        CRamCalc.RenderProperties();
        CRamCalc.AddData(
            {
                id: "<?=$arResult["ID"]?>",
                title: "<?=$arResult["TITLE"]?>",
                conditions: <?=CUtil::PhpToJSObject($arResult["CONDITIONS"])?>,
                calculations: <?=CUtil::PhpToJSObject($arResult["CALCULATIONS"])?>,
                properties: <?=CUtil::PhpToJSObject($arResult["PROPERTIES"])?>,
                multyple: <?=($arParams["MULTYPLE"] === "Y" ? "true" : "false")?>,
                params: "<?=base64_encode(json_encode(array("AJAX_URL" => $componentPath . "/ajax.php", "AJAX" => "Y", "ACTION" => $arParams["ACTION"], "REQUEST_EMAIL" => $arParams["REQUEST_EMAIL"], "ELEMENT_ID" => $arParams["ELEMENT_ID"], "SERVICE_ID" => $arParams["SERVICE_ID"], "PRICE" => $arParams["PRICE"])))?>"
            });
        /*BX.message({"CONFIRM_CALCULATOR_DELETE": "<?=GetMessage("RAM_CALC_CONFIRM_CALCULATOR_DELETE")?>"});*/
        /*CRamCalc.RoundResult();*/
        let calcId = $(".ram-calc__calculator").attr("id");
        if($.cookie("calcCookieInputs"+"_"+calcId) == null || $.cookie("calcCookieSelects"+"_"+calcId) == null || $.cookie("calcCookieHiddens"+"_"+calcId) == null || $.cookie("calcCookieResultPrice"+"_"+calcId) == null){
            CRamCalc.SaveState();
        }
        CRamCalc.LoadState();
        $.cookie("calcCookieBackURL", "<?=$APPLICATION->GetCurPage();?>#order-calc-form", { path: '/', secure: true});
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
    });
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
