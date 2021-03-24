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
$this->setFrameMode(true);

$APPLICATION->SetPageProperty('canonical', "https://".$_SERVER['HTTP_HOST'].$arResult["DETAIL_PAGE_URL"]);

$videoLink = explode('=', $arResult["PROPERTIES"]["VIDEO"]["VALUE"])[1];
?>
<div class="catalog-section-detail-header" itemscope itemtype="http://schema.org/Product">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7 p-0">
                <div class="catalog-section-detail-header__title">
                    <h1 itemprop="name"><?=$arResult["NAME"]?></h1>
                </div>
                <div itemprop="description" class="catalog-section-detail-header__description">
                    <?echo $arResult["PREVIEW_TEXT"];?>
                </div>
                <div class="catalog-section-detail-header__button">
                    <a href="#" data-toggle="modal" data-target="#modalOrderFeedback">Заказать <?=$arResult["NAME"]?></a>
                </div>
            </div>
            <div class="col-md-5 p-0">
                <div class="catalog-section-detail-header__img d-flex justify-content-center align-items-center">
                    <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
                        <img
                            itemprop="image"
                            class="detail_picture"
                            src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
                            alt="<?=$arResult["NAME"]?>"
                            title="<?=$arResult["NAME"]?>"
                        />
                    <?endif?>
                </div>
            </div>
        </div>
    </div>
    <div class="offers" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
        <meta itemprop="price" content="Индивидуальный расчет">
        <meta itemprop="priceCurrency" content="RUB">
        <link itemprop="availability" href="http://schema.org/InStock">
    </div>
</div>
<div class="catalog-section-detail-advantages">
    <div class="container">
        <div class="row justify-content-between">
            <div class="catalog-section-detail-advantages__item">
                <div class="item__img">
                    <img src="<?=SITE_TEMPLATE_PATH;?>/images/fast-print.svg" alt="Быстрая печать">
                </div>
                <div class="item__content">
                    <div class="content__title">
                        Быстрая печать
                    </div>
                    <div class="content__description">
                        от 60 минут
                    </div>
                </div>
            </div>
            <div class="catalog-section-detail-advantages__item">
                <div class="item__img">
                    <img src="<?=SITE_TEMPLATE_PATH;?>/images/economy.svg" alt="Экономия">
                </div>
                <div class="item__content">
                    <div class="content__title">
                        Экономия
                    </div>
                    <div class="content__description">
                        до 30% экономии
                    </div>
                </div>
            </div>
            <div class="catalog-section-detail-advantages__item">
                <div class="item__img">
                    <img src="<?=SITE_TEMPLATE_PATH;?>/images/personal.svg" alt="Персонализация">
                </div>
                <div class="item__content">
                    <div class="content__title">
                        Персонализация
                    </div>
                    <div class="content__description">
                        печатных материалов
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?if(isset($arResult["PROPERTIES"]["CALC"]["VALUE_XML_ID"]) && $arResult["PROPERTIES"]["CALC"]["VALUE_XML_ID"] == "Y" && !empty($arResult["PROPERTIES"]["CALC_SECTION"])):?>
    <?$APPLICATION->IncludeComponent(
        "ram:ram.calc",
        "",
        Array(
            "PRODUCT_NAME" => $arResult["NAME"],
            "PRODUCT_ID" => $arResult["ID"],
            "ACTION" => "calc",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "N",
            "HIDDEN_CALCULATIONS" => array(),
            "JQUERY" => "Y",
            "MULTYPLE" => "N",
            "REQUEST_BTN" => "Отправить",
            "REQUEST_DESCRIPTION" => "Указанная стоимость не является итоговой. Окончательную стоимость уточняйте у менеджера",
            "REQUEST_EMAIL" => "",
            "REQUEST_FAIL" => "Произошла ошибка. Пожалуйста, попробуйте отправить заявку позже.",
            "REQUEST_FIELDS" => array("Электронный адрес",""),
            "REQUEST_SUCCESS" => "Заявка отправлена. Наш менеджер свяжется с Вами в ближайшее время.",
            "SERVICE_ID" => $arResult["PROPERTIES"]["CALC_SECTION"],
            "TEMPLATE_THEME" => "red",
            "USER_CONSENT" => "N",
            "USER_CONSENT_ID" => "0",
            "USER_CONSENT_IS_CHECKED" => "Y",
            "USER_CONSENT_IS_LOADED" => "N",
            "USE_IMPRINT" => $arResult["PROPERTIES"]["IMPRINT"]["VALUE_XML_ID"]
        )
    );?>
<?endif;?>
<div class="catalog-section-detail-content">
    <div class="container">
        <h2><?=$arResult["NAME"]?></h2>
        <p>
            <?echo $arResult["DETAIL_TEXT"];?>
        </p>
    </div>
</div>
<?if(isset($videoLink) && !empty($videoLink)):?>
<div class="catalog-section-detail-video">
    <div class="container">
        <iframe src="https://www.youtube.com/embed/<?=$videoLink;?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>
<?endif;?>
<?if(isset($arResult["PROPERTIES"]["SLIDER_SECTION"]["VALUE"]) && !empty($arResult["PROPERTIES"]["SLIDER_SECTION"]["VALUE"])):?>
<section class="catalog-section-detail-cases">
    <div class="container">
        <div class="row justify-content-center">
            <h2>Наше портфолио:</h2>
        </div>
        <?$APPLICATION->IncludeComponent("bitrix:news.list", "catalog_cases_detail", Array(
            "ELEMENT_ID" => $arResult["PROPERTIES"]["SLIDER_SECTION"]["VALUE"],
            "ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
            "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
            "AJAX_MODE" => "N",	// Включить режим AJAX
            "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
            "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
            "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
            "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
            "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
            "CACHE_GROUPS" => "Y",	// Учитывать права доступа
            "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
            "CACHE_TYPE" => "A",	// Тип кеширования
            "CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
            "DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
            "DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
            "DISPLAY_DATE" => "N",	// Выводить дату элемента
            "DISPLAY_NAME" => "Y",	// Выводить название элемента
            "DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
            "DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
            "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
            "FIELD_CODE" => array(	// Поля
                0 => "",
                1 => "",
            ),
            "FILTER_NAME" => "",	// Фильтр
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
            "IBLOCK_ID" => "15",	// Код информационного блока
            "IBLOCK_TYPE" => "services",	// Тип информационного блока (используется только для проверки)
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
            "INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
            "MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
            "NEWS_COUNT" => "200",	// Количество новостей на странице
            "PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
            "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
            "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
            "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
            "PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
            "PAGER_TITLE" => "Новости",	// Название категорий
            "PARENT_SECTION" => "",	// ID раздела
            "PARENT_SECTION_CODE" => "",	// Код раздела
            "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
            "PROPERTY_CODE" => array(	// Свойства
                0 => "IMAGES",
                1 => "",
            ),
            "SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
            "SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
            "SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
            "SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
            "SET_STATUS_404" => "N",	// Устанавливать статус 404
            "SET_TITLE" => "N",	// Устанавливать заголовок страницы
            "SHOW_404" => "N",	// Показ специальной страницы
            "SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
            "SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
            "SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
            "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
            "STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
        ),
            false
        );?>
        <?$APPLICATION->IncludeComponent("bitrix:news.list", "catalog_cases_detail_mobile", Array(
            "ELEMENT_ID" => $arResult["PROPERTIES"]["SLIDER_SECTION"]["VALUE"],
            "ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
            "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
            "AJAX_MODE" => "N",	// Включить режим AJAX
            "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
            "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
            "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
            "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
            "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
            "CACHE_GROUPS" => "Y",	// Учитывать права доступа
            "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
            "CACHE_TYPE" => "A",	// Тип кеширования
            "CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
            "DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
            "DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
            "DISPLAY_DATE" => "N",	// Выводить дату элемента
            "DISPLAY_NAME" => "Y",	// Выводить название элемента
            "DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
            "DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
            "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
            "FIELD_CODE" => array(	// Поля
                0 => "",
                1 => "",
            ),
            "FILTER_NAME" => "",	// Фильтр
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
            "IBLOCK_ID" => "15",	// Код информационного блока
            "IBLOCK_TYPE" => "services",	// Тип информационного блока (используется только для проверки)
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
            "INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
            "MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
            "NEWS_COUNT" => "200",	// Количество новостей на странице
            "PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
            "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
            "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
            "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
            "PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
            "PAGER_TITLE" => "Новости",	// Название категорий
            "PARENT_SECTION" => "",	// ID раздела
            "PARENT_SECTION_CODE" => "",	// Код раздела
            "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
            "PROPERTY_CODE" => array(	// Свойства
                0 => "IMAGES",
                1 => "",
            ),
            "SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
            "SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
            "SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
            "SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
            "SET_STATUS_404" => "N",	// Устанавливать статус 404
            "SET_TITLE" => "N",	// Устанавливать заголовок страницы
            "SHOW_404" => "N",	// Показ специальной страницы
            "SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
            "SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
            "SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
            "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
            "STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
        ),
            false
        );?>
    </div>
</section>
<?endif;?>
<?$APPLICATION->IncludeComponent(
    "growtag:main.feedback",
    "peshta_order_modal",
    array(
        "ELEMENT_NAME" => $arResult["NAME"],
        "USE_CAPTCHA" => "N",
        "OK_TEXT" => "Заявка на обратный звонок успешно отправлена. Ожидайте звонка наших менеджеров.",
        "EMAIL_TO" => "",
        "REQUIRED_FIELDS" => array(
            0 => "NAME",
        ),
        "EVENT_MESSAGE_ID" => array(
            0 => "27",
        ),
        "COMPONENT_TEMPLATE" => "peshta_order_modal",
        "USER_CONSENT" => "N",
        "USER_CONSENT_ID" => "0",
        "USER_CONSENT_IS_CHECKED" => "Y",
        "USER_CONSENT_IS_LOADED" => "N"
    ),
    false
);?>
