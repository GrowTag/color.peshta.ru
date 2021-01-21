<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<?if(!empty($arResult["ERROR_MESSAGE"]))
{?>
    <script type="text/javascript">
        $(document).ready(function() {
            toastr.error('<?=$arResult["ERROR_MESSAGE"][0];?>', 'УПС!...');
        });
    </script>
<?}
if(strlen($arResult["OK_MESSAGE"]) > 0)
{
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            toastr.success('<?=$arResult["OK_MESSAGE"]?>', 'Успешно!');
        });
    </script>
    <?
}
?>
<?if($arParams["CALC"] == "Y"):?>
<div class="catalog-section-detail-order">
    <div class="row justify-content-center">
        <h2>Расчет стоимости визиток</h2>
    </div>
    <div class="container">
        <div class="row">
    <div class="catalog-detail-section-order__form">
        <form action="<?=POST_FORM_ACTION_URI?>" method="POST">
        <?=bitrix_sessid_post()?>
        <div class="row">
            <div class="col-md-8 col-sm-12 form__left">
                <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "order_sections", Array(
                    "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
                    "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
                    "CACHE_GROUPS" => "Y",	// Учитывать права доступа
                    "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
                    "CACHE_TYPE" => "N",	// Тип кеширования
                    "COMPOSITE_FRAME_MODE" => "A",	// Голосование шаблона компонента по умолчанию
                    "COMPOSITE_FRAME_TYPE" => "AUTO",	// Содержимое компонента
                    "COUNT_ELEMENTS" => "N",	// Показывать количество элементов в разделе
                    "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",	// Показывать количество
                    "FILTER_NAME" => "sectionsFilter",	// Имя массива со значениями фильтра разделов
                    "IBLOCK_ID" => "16",	// Инфоблок
                    "IBLOCK_TYPE" => "ordercalc",	// Тип инфоблока
                    "SECTION_CODE" => "",	// Код раздела
                    "SECTION_FIELDS" => array(	// Поля разделов
                        0 => "",
                        1 => "",
                    ),
                    "SECTION_ID" => (int)$arParams["CALC_SECTION"],	// ID раздела
                    "SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
                    "SECTION_USER_FIELDS" => array(	// Свойства разделов
                        0 => "",
                        1 => "",
                    ),
                    "SHOW_PARENT_NAME" => "N",	// Показывать название раздела
                    "TOP_DEPTH" => "3",	// Максимальная отображаемая глубина разделов
                    "VIEW_MODE" => "LINE",	// Вид списка подразделов
                ),
                    false
                );?>
            </div>
            <div class="form__right col-md-4 col-sm-12 d-flex flex-column">
                <div class="form__right-top d-flex justify-content-center">Ничего не выбрано</div>
                <div class="form__right-center d-flex align-self-center justify-content-center">
                    Итоговая стоимость<br/>
                    <span>2460₽</span>
                </div>
                <div class="form__right-bottom d-flex justify-content-center">
                    <input type="hidden" name="PRICE" value="Индивидуальный расчет"/>
                    <input type="hidden" name="USER_ID" value="<?=$USER->GetID();?>">
                    <input type="hidden" name="ELEMENT_NAME" value="<?=$arParams["ELEMENT_NAME"]?>">
                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse-modal">
                    <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
                    <input title="Нажимая 'Заказать' вы соглашаетесь с политикой конфиденциальности." <?if(strlen($arResult["OK_MESSAGE"]) > 0 || isset($_GET['success'])):?>disabled<?endif;?> type="button" name="submit" value="Заказать" class="red-button"/>
                </div>
            </div>
        </div>
        </form>
    </div>
        </div>
    </div>
</div>
<?endif;?>
