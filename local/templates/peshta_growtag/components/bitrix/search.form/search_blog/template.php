<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);?>
<section class="search-section">
    <form action="<?=$arResult["FORM_ACTION"]?>" class="search-section__form search-form">
        <div class="container">
            <div class="row">
                <div class="col-9 col-sm-10">
                    <?if($arParams["USE_SUGGEST"] === "Y"):?>
                        <?$APPLICATION->IncludeComponent(
                        "bitrix:search.suggest.input",
                        "",
                        array(
                            "NAME" => "q",
                            "VALUE" => "",
                            "INPUT_SIZE" => 15,
                            "DROPDOWN_SIZE" => 10,
                        ),
                        $component, array("HIDE_ICONS" => "Y")
                    );?>
                    <?else:?>
                    <input name="q" class="search-form__input" type="text" placeholder="Как сделать визитки?">
                    <?endif;?>
                </div>
                <div class="col-3 col-sm-2">
                    <input name="s" type="submit" value="Найти" class="search-form__button"/>
                </div>
            </div>
        </div>
    </form>
</section>