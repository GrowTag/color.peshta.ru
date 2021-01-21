<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html xmlns:og="http://ogp.me/ns#">
<head>
    <?$APPLICATION->ShowHead();?>
    <title><?$APPLICATION->ShowTitle()?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="yandex-verification" content="1bfb630fd0490649" />
    <meta name="yandex-verification" content="c951c25d8653adb2" />
    <meta property="og:title" content="<?$APPLICATION->ShowTitle();?>"/>
    <meta property="og:url" content="<?=$APPLICATION->GetCurDir()?>"/>
    <meta property="og:image" content="<?=SITE_TEMPLATE_PATH?>/images/logo.png"/>
    <meta property="og:site_name" content="ПЕШТА - Типография Ижевск"/>
    <meta property="og:description" content="<?$APPLICATION->ShowProperty('description');?>"/>
    <meta property="og:type" content="website" />
    <meta name="copyright" lang="ru" content='Типография "ПЕШТА" Ижевск' />
    <link rel="shortcut icon" type="image/x-icon" href="<?=SITE_TEMPLATE_PATH?>/favicon.ico" />
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/style/style.css">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/style/style-new.css">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/style/slick.css">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/style/slick-theme.css">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/js/bootstrap-offcanvas/dist/css/bootstrap.offcanvas.min.css">
    <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,700&amp;subset=cyrillic" rel="stylesheet">
    <script type="text/javascript">
        var body = document.body;
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://kit.fontawesome.com/21d8d1f82e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/slick.min.js"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/bootstrap-offcanvas/dist/js/bootstrap.offcanvas.js"></script>
    <!--<script type="text/javascript" src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-162465716-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-162465716-2');
    </script>
</head>
<body>
<div id="hellopreloader"><div id="hellopreloader_preload"><p class="pulse"><img width="200px" src="<?=SITE_TEMPLATE_PATH?>/images/logo-footer.png"/></p></div></div>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<nav class="navbar navbar-light bg-light">
    <div class="row header">
        <div class="container">
                <div class="header-top d-flex bd-highlight align-items-center mb-1">
                    <div class="mr-auto p-2 bd-highlight">
                        <div class="header-top-left-logo">
                            <a href="/"><img src="<?=SITE_TEMPLATE_PATH;?>/images/logo-header.png" alt="ПЕШТА" width="150"></a>
                        </div>
                        <div class="header-top-left-address">
                            <div>г. Ижевск, ул. Кирова, 113</div>
                            <div>Пн. – Пт. с 09:00 до 20:00</div>
                        </div>
                    </div>
                    <div class="p-2 bd-highlight"><div class="header-top-right-mail"><a href="mailto:info@peshta.ru"><i class="fas fa-envelope"></i> info@peshta.ru</a></div></div>
                    <div class="p-2 bd-highlight"><a href="/personal" class="btn-gray"><i class="fas fa-user"></i> Кабинет</a></div>
                    <div class="p-2 bd-highlight">
                        <div class="header-top-tel">
                            <a href="tel:+73412400200">+7 (3412) 400-200</a>
                        </div>
                        <div class="header-top-call">
                            <a href="#" data-target="#modalCallback" data-toggle="modal">Заказать звонок</a>
                        </div>
                    </div>
                </div>
                <div class="header-bottom d-flex bd-highlight align-items-center mb-1">
                    <div class="mr-auto p-2 bd-highlight menu">
                        <ul class="menu-head">
                            <li>
                                <div class="dropdown-menu-item">
                                    <a class="dropdown-toggle dropbtn" href="/catalog/">
                                        Каталог
                                    </a>
                                    <div class="dropdown-menu-item-content">
                                        <?$APPLICATION->IncludeComponent("bitrix:news.list", "catalog_section_menu", Array(
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
                                            "DISPLAY_DATE" => "Y",	// Выводить дату элемента
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
                                            "IBLOCK_ID" => "18",	// Код информационного блока
                                            "IBLOCK_TYPE" => "catalog",	// Тип информационного блока (используется только для проверки)
                                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
                                            "INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
                                            "MEDIA_PROPERTY" => "",	// Свойство для отображения медиа
                                            "MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
                                            "NEWS_COUNT" => "20",	// Количество новостей на странице
                                            "PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
                                            "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
                                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
                                            "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
                                            "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
                                            "PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
                                            "PAGER_TITLE" => "Каталог",	// Название категорий
                                            "PARENT_SECTION" => "79",	// ID раздела
                                            "PARENT_SECTION_CODE" => "",	// Код раздела
                                            "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
                                            "PROPERTY_CODE" => array(	// Свойства
                                                0 => "",
                                                1 => "",
                                            ),
                                            "SEARCH_PAGE" => "/search/",	// Путь к странице поиска
                                            "SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
                                            "SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
                                            "SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
                                            "SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
                                            "SET_STATUS_404" => "Y",	// Устанавливать статус 404
                                            "SET_TITLE" => "N",	// Устанавливать заголовок страницы
                                            "SHOW_404" => "N",	// Показ специальной страницы
                                            "SLIDER_PROPERTY" => "",	// Свойство с изображениями для слайдера
                                            "SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
                                            "SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
                                            "SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
                                            "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
                                            "STRICT_SECTION_CHECK" => "Y",	// Строгая проверка раздела для показа списка
                                            "TEMPLATE_THEME" => "blue",	// Цветовая тема
                                            "USE_RATING" => "N",	// Разрешить голосование
                                            "USE_SHARE" => "N",	// Отображать панель соц. закладок
                                        ),
                                            false
                                        );?>
                                        <?$APPLICATION->IncludeComponent(
                                            "bitrix:news.list",
                                            "catalog_section_menu",
                                            Array(
                                                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                                "ADD_SECTIONS_CHAIN" => "N",
                                                "AJAX_MODE" => "N",
                                                "AJAX_OPTION_ADDITIONAL" => "",
                                                "AJAX_OPTION_HISTORY" => "N",
                                                "AJAX_OPTION_JUMP" => "N",
                                                "AJAX_OPTION_STYLE" => "Y",
                                                "CACHE_FILTER" => "N",
                                                "CACHE_GROUPS" => "Y",
                                                "CACHE_TIME" => "36000000",
                                                "CACHE_TYPE" => "A",
                                                "CHECK_DATES" => "Y",
                                                "DETAIL_URL" => "",
                                                "DISPLAY_BOTTOM_PAGER" => "N",
                                                "DISPLAY_DATE" => "Y",
                                                "DISPLAY_NAME" => "Y",
                                                "DISPLAY_PICTURE" => "Y",
                                                "DISPLAY_PREVIEW_TEXT" => "Y",
                                                "DISPLAY_TOP_PAGER" => "N",
                                                "FIELD_CODE" => array("",""),
                                                "FILTER_NAME" => "",
                                                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                                "IBLOCK_ID" => "18",
                                                "IBLOCK_TYPE" => "catalog",
                                                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                                "INCLUDE_SUBSECTIONS" => "Y",
                                                "MEDIA_PROPERTY" => "",
                                                "MESSAGE_404" => "",
                                                "NEWS_COUNT" => "20",
                                                "PAGER_BASE_LINK_ENABLE" => "N",
                                                "PAGER_DESC_NUMBERING" => "N",
                                                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                                "PAGER_SHOW_ALL" => "N",
                                                "PAGER_SHOW_ALWAYS" => "N",
                                                "PAGER_TEMPLATE" => ".default",
                                                "PAGER_TITLE" => "Каталог",
                                                "PARENT_SECTION" => "80",
                                                "PARENT_SECTION_CODE" => "",
                                                "PREVIEW_TRUNCATE_LEN" => "",
                                                "PROPERTY_CODE" => array("",""),
                                                "SEARCH_PAGE" => "/search/",
                                                "SET_BROWSER_TITLE" => "N",
                                                "SET_LAST_MODIFIED" => "N",
                                                "SET_META_DESCRIPTION" => "N",
                                                "SET_META_KEYWORDS" => "N",
                                                "SET_STATUS_404" => "Y",
                                                "SET_TITLE" => "N",
                                                "SHOW_404" => "N",
                                                "SLIDER_PROPERTY" => "",
                                                "SORT_BY1" => "ACTIVE_FROM",
                                                "SORT_BY2" => "SORT",
                                                "SORT_ORDER1" => "DESC",
                                                "SORT_ORDER2" => "ASC",
                                                "STRICT_SECTION_CHECK" => "Y",
                                                "TEMPLATE_THEME" => "blue",
                                                "USE_RATING" => "N",
                                                "USE_SHARE" => "N"
                                            )
                                        );?>
                                        <?$APPLICATION->IncludeComponent(
                                            "bitrix:news.list",
                                            "catalog_section_menu",
                                            Array(
                                                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                                "ADD_SECTIONS_CHAIN" => "N",
                                                "AJAX_MODE" => "N",
                                                "AJAX_OPTION_ADDITIONAL" => "",
                                                "AJAX_OPTION_HISTORY" => "N",
                                                "AJAX_OPTION_JUMP" => "N",
                                                "AJAX_OPTION_STYLE" => "Y",
                                                "CACHE_FILTER" => "N",
                                                "CACHE_GROUPS" => "Y",
                                                "CACHE_TIME" => "36000000",
                                                "CACHE_TYPE" => "A",
                                                "CHECK_DATES" => "Y",
                                                "DETAIL_URL" => "",
                                                "DISPLAY_BOTTOM_PAGER" => "N",
                                                "DISPLAY_DATE" => "Y",
                                                "DISPLAY_NAME" => "Y",
                                                "DISPLAY_PICTURE" => "Y",
                                                "DISPLAY_PREVIEW_TEXT" => "Y",
                                                "DISPLAY_TOP_PAGER" => "N",
                                                "FIELD_CODE" => array("",""),
                                                "FILTER_NAME" => "",
                                                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                                "IBLOCK_ID" => "18",
                                                "IBLOCK_TYPE" => "catalog",
                                                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                                "INCLUDE_SUBSECTIONS" => "Y",
                                                "MEDIA_PROPERTY" => "",
                                                "MESSAGE_404" => "",
                                                "NEWS_COUNT" => "20",
                                                "PAGER_BASE_LINK_ENABLE" => "N",
                                                "PAGER_DESC_NUMBERING" => "N",
                                                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                                "PAGER_SHOW_ALL" => "N",
                                                "PAGER_SHOW_ALWAYS" => "N",
                                                "PAGER_TEMPLATE" => ".default",
                                                "PAGER_TITLE" => "Каталог",
                                                "PARENT_SECTION" => "83",
                                                "PARENT_SECTION_CODE" => "",
                                                "PREVIEW_TRUNCATE_LEN" => "",
                                                "PROPERTY_CODE" => array("",""),
                                                "SEARCH_PAGE" => "/search/",
                                                "SET_BROWSER_TITLE" => "N",
                                                "SET_LAST_MODIFIED" => "N",
                                                "SET_META_DESCRIPTION" => "N",
                                                "SET_META_KEYWORDS" => "N",
                                                "SET_STATUS_404" => "Y",
                                                "SET_TITLE" => "N",
                                                "SHOW_404" => "N",
                                                "SLIDER_PROPERTY" => "",
                                                "SORT_BY1" => "ACTIVE_FROM",
                                                "SORT_BY2" => "SORT",
                                                "SORT_ORDER1" => "DESC",
                                                "SORT_ORDER2" => "ASC",
                                                "STRICT_SECTION_CHECK" => "Y",
                                                "TEMPLATE_THEME" => "blue",
                                                "USE_RATING" => "N",
                                                "USE_SHARE" => "N"
                                            )
                                        );?>
                                        <?$APPLICATION->IncludeComponent(
                                            "bitrix:news.list",
                                            "catalog_section_menu",
                                            Array(
                                                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                                "ADD_SECTIONS_CHAIN" => "N",
                                                "AJAX_MODE" => "N",
                                                "AJAX_OPTION_ADDITIONAL" => "",
                                                "AJAX_OPTION_HISTORY" => "N",
                                                "AJAX_OPTION_JUMP" => "N",
                                                "AJAX_OPTION_STYLE" => "Y",
                                                "CACHE_FILTER" => "N",
                                                "CACHE_GROUPS" => "Y",
                                                "CACHE_TIME" => "36000000",
                                                "CACHE_TYPE" => "A",
                                                "CHECK_DATES" => "Y",
                                                "DETAIL_URL" => "",
                                                "DISPLAY_BOTTOM_PAGER" => "N",
                                                "DISPLAY_DATE" => "Y",
                                                "DISPLAY_NAME" => "Y",
                                                "DISPLAY_PICTURE" => "Y",
                                                "DISPLAY_PREVIEW_TEXT" => "Y",
                                                "DISPLAY_TOP_PAGER" => "N",
                                                "FIELD_CODE" => array("",""),
                                                "FILTER_NAME" => "",
                                                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                                "IBLOCK_ID" => "18",
                                                "IBLOCK_TYPE" => "catalog",
                                                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                                "INCLUDE_SUBSECTIONS" => "Y",
                                                "MEDIA_PROPERTY" => "",
                                                "MESSAGE_404" => "",
                                                "NEWS_COUNT" => "20",
                                                "PAGER_BASE_LINK_ENABLE" => "N",
                                                "PAGER_DESC_NUMBERING" => "N",
                                                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                                "PAGER_SHOW_ALL" => "N",
                                                "PAGER_SHOW_ALWAYS" => "N",
                                                "PAGER_TEMPLATE" => ".default",
                                                "PAGER_TITLE" => "Каталог",
                                                "PARENT_SECTION" => "82",
                                                "PARENT_SECTION_CODE" => "",
                                                "PREVIEW_TRUNCATE_LEN" => "",
                                                "PROPERTY_CODE" => array("",""),
                                                "SEARCH_PAGE" => "/search/",
                                                "SET_BROWSER_TITLE" => "N",
                                                "SET_LAST_MODIFIED" => "N",
                                                "SET_META_DESCRIPTION" => "N",
                                                "SET_META_KEYWORDS" => "N",
                                                "SET_STATUS_404" => "Y",
                                                "SET_TITLE" => "N",
                                                "SHOW_404" => "N",
                                                "SLIDER_PROPERTY" => "",
                                                "SORT_BY1" => "ACTIVE_FROM",
                                                "SORT_BY2" => "SORT",
                                                "SORT_ORDER1" => "DESC",
                                                "SORT_ORDER2" => "ASC",
                                                "STRICT_SECTION_CHECK" => "Y",
                                                "TEMPLATE_THEME" => "blue",
                                                "USE_RATING" => "N",
                                                "USE_SHARE" => "N"
                                            )
                                        );?>
                                        <?$APPLICATION->IncludeComponent(
                                            "bitrix:news.list",
                                            "catalog_section_menu",
                                            Array(
                                                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                                "ADD_SECTIONS_CHAIN" => "N",
                                                "AJAX_MODE" => "N",
                                                "AJAX_OPTION_ADDITIONAL" => "",
                                                "AJAX_OPTION_HISTORY" => "N",
                                                "AJAX_OPTION_JUMP" => "N",
                                                "AJAX_OPTION_STYLE" => "Y",
                                                "CACHE_FILTER" => "N",
                                                "CACHE_GROUPS" => "Y",
                                                "CACHE_TIME" => "36000000",
                                                "CACHE_TYPE" => "A",
                                                "CHECK_DATES" => "Y",
                                                "DETAIL_URL" => "",
                                                "DISPLAY_BOTTOM_PAGER" => "N",
                                                "DISPLAY_DATE" => "Y",
                                                "DISPLAY_NAME" => "Y",
                                                "DISPLAY_PICTURE" => "Y",
                                                "DISPLAY_PREVIEW_TEXT" => "Y",
                                                "DISPLAY_TOP_PAGER" => "N",
                                                "FIELD_CODE" => array("",""),
                                                "FILTER_NAME" => "",
                                                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                                "IBLOCK_ID" => "18",
                                                "IBLOCK_TYPE" => "catalog",
                                                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                                "INCLUDE_SUBSECTIONS" => "Y",
                                                "MEDIA_PROPERTY" => "",
                                                "MESSAGE_404" => "",
                                                "NEWS_COUNT" => "20",
                                                "PAGER_BASE_LINK_ENABLE" => "N",
                                                "PAGER_DESC_NUMBERING" => "N",
                                                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                                "PAGER_SHOW_ALL" => "N",
                                                "PAGER_SHOW_ALWAYS" => "N",
                                                "PAGER_TEMPLATE" => ".default",
                                                "PAGER_TITLE" => "Каталог",
                                                "PARENT_SECTION" => "81",
                                                "PARENT_SECTION_CODE" => "",
                                                "PREVIEW_TRUNCATE_LEN" => "",
                                                "PROPERTY_CODE" => array("",""),
                                                "SEARCH_PAGE" => "/search/",
                                                "SET_BROWSER_TITLE" => "N",
                                                "SET_LAST_MODIFIED" => "N",
                                                "SET_META_DESCRIPTION" => "N",
                                                "SET_META_KEYWORDS" => "N",
                                                "SET_STATUS_404" => "Y",
                                                "SET_TITLE" => "N",
                                                "SHOW_404" => "N",
                                                "SLIDER_PROPERTY" => "",
                                                "SORT_BY1" => "ACTIVE_FROM",
                                                "SORT_BY2" => "SORT",
                                                "SORT_ORDER1" => "DESC",
                                                "SORT_ORDER2" => "ASC",
                                                "STRICT_SECTION_CHECK" => "Y",
                                                "TEMPLATE_THEME" => "blue",
                                                "USE_RATING" => "N",
                                                "USE_SHARE" => "N"
                                            )
                                        );?>
                                        <?$APPLICATION->IncludeComponent(
                                            "bitrix:news.list",
                                            "catalog_section_menu",
                                            Array(
                                                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                                "ADD_SECTIONS_CHAIN" => "N",
                                                "AJAX_MODE" => "N",
                                                "AJAX_OPTION_ADDITIONAL" => "",
                                                "AJAX_OPTION_HISTORY" => "N",
                                                "AJAX_OPTION_JUMP" => "N",
                                                "AJAX_OPTION_STYLE" => "Y",
                                                "CACHE_FILTER" => "N",
                                                "CACHE_GROUPS" => "Y",
                                                "CACHE_TIME" => "36000000",
                                                "CACHE_TYPE" => "A",
                                                "CHECK_DATES" => "Y",
                                                "DETAIL_URL" => "",
                                                "DISPLAY_BOTTOM_PAGER" => "N",
                                                "DISPLAY_DATE" => "Y",
                                                "DISPLAY_NAME" => "Y",
                                                "DISPLAY_PICTURE" => "Y",
                                                "DISPLAY_PREVIEW_TEXT" => "Y",
                                                "DISPLAY_TOP_PAGER" => "N",
                                                "FIELD_CODE" => array("",""),
                                                "FILTER_NAME" => "",
                                                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                                "IBLOCK_ID" => "18",
                                                "IBLOCK_TYPE" => "catalog",
                                                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                                "INCLUDE_SUBSECTIONS" => "Y",
                                                "MEDIA_PROPERTY" => "",
                                                "MESSAGE_404" => "",
                                                "NEWS_COUNT" => "20",
                                                "PAGER_BASE_LINK_ENABLE" => "N",
                                                "PAGER_DESC_NUMBERING" => "N",
                                                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                                "PAGER_SHOW_ALL" => "N",
                                                "PAGER_SHOW_ALWAYS" => "N",
                                                "PAGER_TEMPLATE" => ".default",
                                                "PAGER_TITLE" => "Каталог",
                                                "PARENT_SECTION" => "84",
                                                "PARENT_SECTION_CODE" => "",
                                                "PREVIEW_TRUNCATE_LEN" => "",
                                                "PROPERTY_CODE" => array("",""),
                                                "SEARCH_PAGE" => "/search/",
                                                "SET_BROWSER_TITLE" => "N",
                                                "SET_LAST_MODIFIED" => "N",
                                                "SET_META_DESCRIPTION" => "N",
                                                "SET_META_KEYWORDS" => "N",
                                                "SET_STATUS_404" => "Y",
                                                "SET_TITLE" => "N",
                                                "SHOW_404" => "N",
                                                "SLIDER_PROPERTY" => "",
                                                "SORT_BY1" => "ACTIVE_FROM",
                                                "SORT_BY2" => "SORT",
                                                "SORT_ORDER1" => "DESC",
                                                "SORT_ORDER2" => "ASC",
                                                "STRICT_SECTION_CHECK" => "Y",
                                                "TEMPLATE_THEME" => "blue",
                                                "USE_RATING" => "N",
                                                "USE_SHARE" => "N"
                                            )
                                        );?>
                                    </div>
                                </div>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <?$APPLICATION->IncludeComponent("bitrix:news.list","menu_head",Array(
                                            "DISPLAY_DATE" => "N",
                                            "DISPLAY_NAME" => "Y",
                                            "DISPLAY_PICTURE" => "N",
                                            "DISPLAY_PREVIEW_TEXT" => "N",
                                            "AJAX_MODE" => "N",
                                            "IBLOCK_TYPE" => "news",
                                            "IBLOCK_ID" => "18",
                                            "NEWS_COUNT" => "200",
                                            "SORT_BY1" => "ACTIVE_FROM",
                                            "SORT_ORDER1" => "DESC",
                                            "SORT_BY2" => "SORT",
                                            "SORT_ORDER2" => "ASC",
                                            "FILTER_NAME" => "",
                                            "FIELD_CODE" => Array("ID"),
                                            "PROPERTY_CODE" => Array("DESCRIPTION"),
                                            "CHECK_DATES" => "Y",
                                            "DETAIL_URL" => "",
                                            "PREVIEW_TRUNCATE_LEN" => "",
                                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                            "SET_TITLE" => "N",
                                            "SET_BROWSER_TITLE" => "N",
                                            "SET_META_KEYWORDS" => "N",
                                            "SET_META_DESCRIPTION" => "N",
                                            "SET_LAST_MODIFIED" => "Y",
                                            "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
                                            "ADD_SECTIONS_CHAIN" => "Y",
                                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                            "PARENT_SECTION" => "",
                                            "PARENT_SECTION_CODE" => "",
                                            "INCLUDE_SUBSECTIONS" => "Y",
                                            "CACHE_TYPE" => "N",
                                            "CACHE_TIME" => "3600",
                                            "CACHE_FILTER" => "Y",
                                            "CACHE_GROUPS" => "Y",
                                            "DISPLAY_TOP_PAGER" => "N",
                                            "DISPLAY_BOTTOM_PAGER" => "N",
                                            "PAGER_TITLE" => "Новости",
                                            "PAGER_SHOW_ALWAYS" => "N",
                                            "PAGER_TEMPLATE" => "",
                                            "PAGER_DESC_NUMBERING" => "Y",
                                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                            "PAGER_SHOW_ALL" => "N",
                                            "PAGER_BASE_LINK_ENABLE" => "Y",
                                            "SET_STATUS_404" => "Y",
                                            "SHOW_404" => "Y",
                                            "MESSAGE_404" => "",
                                            "PAGER_BASE_LINK" => "",
                                            "PAGER_PARAMS_NAME" => "arrPager",
                                            "AJAX_OPTION_JUMP" => "N",
                                            "AJAX_OPTION_STYLE" => "Y",
                                            "AJAX_OPTION_HISTORY" => "N",
                                            "AJAX_OPTION_ADDITIONAL" => ""
                                        )
                                    );?>
                                </div>
                            </li>
                            <?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	".default",
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"DELAY" => "N",
		"MAX_LEVEL" => "2",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "top",
		"USE_EXT" => "Y",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>
                        </ul>
                    </div>
                    <div class="p-2 bd-highlight search">
                        <a href="/search"><i class="fas fa-search"></i></a>
                    </div>
                    <div class="p-2 bd-highlight callback">
                        <a href="#" data-target="#modalSettlement" data-toggle="modal" class="btn-red">Заявка на расчет</a>
                    </div>
                </div>
        </div>
    </div>
</nav>
<!-- NAVBAR MOBILE -->
<nav class="navbar navbar-mobile fixed-top ">
    <div class="navbar__right">
        <button type="button" class="navbar-toggle offcanvas-toggle pull-right" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas" style="float:left;">
            <span class="sr-only">Toggle navigation</span>
            <svg class="ham hamRotate ham8" viewBox="0 0 100 100" width="48" onclick="this.classList.toggle('active')">
                <path
                    class="line top"
                    d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20" />
                <path
                    class="line middle"
                    d="m 30,50 h 40" />
                <path
                    class="line bottom"
                    d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20" />
            </svg>
        </button>
        <a href="/"><img src="<?=SITE_TEMPLATE_PATH;?>/images/logo-header.png" alt="ПЕШТА" height="48"></a>
    </div>
    <div class="navbar__left">
        <a class="mobile-button-call">
            <i class="fas fa-phone-alt"></i>
        </a>
        <a class="mobile-button-login">
            <i class="fas fa-user"></i>Вход
        </a>
    </div>
</nav>
<div class="navbar-offcanvas navbar-offcanvas-touch" id="js-bootstrap-offcanvas">
    <form id="mobile-search">
        <input type="text" placeholder="Поиск">
        <button type="submit"></button>
    </form>
    <div class="mobile-call">
        <a href="tel:+73412400200" class="mobile-call__telephone">+7 (3412) 400-200</a>
        <a href="#" data-target="#modalCallback" data-toggle="modal" class="mobile-call__callback">Заказать звонок</a>
    </div>
    <hr/>
    <a href="#" data-target="#modalSettlement" data-toggle="modal" class="mobile-red-button">Заявка на расчет</a>
    <div class="mobile-menu">
        <div class="accordion" id="accordionMobileMenu">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Каталог
                        </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionMobileMenu">
                    <div class="card-body">
                        <ul>
                            <li><a href="/catalog/">Весь каталог</a></li>
                            <li><a href="/catalog/vizitki/">Визитки</a></li>
                            <li><a href="/catalog/ezhednevniki/">Ежедневники</a></li>
                            <li><a href="/catalog/blanki/">Бланки</a></li>
                            <li><a href="/catalog/firmennye-papki/">Фирменные папки</a></li>
                            <li><a href="/catalog/pechati-i-shtampy/">Печати и штампы</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <ul>
            <li>
                <a href="/about/">О компании</a>
            </li>
            <li>
                <a href="/biz/">Для бизнеса</a>
            </li>
            <li>
                <a href="/digital/">Пешта Digital</a>
            </li>
            <li>
                <a href="/works/">Наши кейсы</a>
            </li>
            <li>
                <a href="/blog/">Блог</a>
            </li>
            <li>
                <a href="/contacts/">Контакты</a>
            </li>
        </ul>
        <hr/>
        <div class="mobile-menu__mail">
            <a href="mailto:info@peshta.ru">
                <i class="fas fa-envelope" aria-hidden="true"></i> info@peshta.ru
            </a>
        </div>
    </div>
</div>
