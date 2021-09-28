<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Полезные статьи о полиграфии, маркетинге, бизнесе и дизайне. Лайфхаки, советы и экспертная информация, которая обязательно вам пригодится.");
$APPLICATION->SetPageProperty("title", "Блог | Типография Пешта");
$APPLICATION->SetTitle("ПЕШТА - Блог");

if(!isset($_REQUEST["PAGEN_1"])){
    $newsCount = 7;
} else {
    $newsCount = 6;
}

?>
<main class="site-main">
        <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "blog_sections_list", Array(
            "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
            "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
            "CACHE_GROUPS" => "Y",	// Учитывать права доступа
            "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
            "CACHE_TYPE" => "A",	// Тип кеширования
            "COUNT_ELEMENTS" => "N",	// Показывать количество элементов в разделе
            "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",	// Показывать количество
            "FILTER_NAME" => "sectionsFilter",	// Имя массива со значениями фильтра разделов
            "IBLOCK_ID" => "20",	// Инфоблок
            "IBLOCK_TYPE" => "blog",	// Тип инфоблока
            "SECTION_CODE" => $_REQUEST["SECTION_CODE"],	// Код раздела
            "SECTION_FIELDS" => array(	// Поля разделов
                0 => "ID",
                1 => "CODE",
                2 => "NAME",
                3 => "SORT",
                4 => "",
            ),
            "SECTION_ID" => $_REQUEST["SECTION_ID"],	// ID раздела
            "SECTION_URL" => "/blog/#CODE#/",	// URL, ведущий на страницу с содержимым раздела
            "SECTION_USER_FIELDS" => array(	// Свойства разделов
                0 => "",
                1 => "",
            ),
            "SHOW_PARENT_NAME" => "Y",	// Показывать название раздела
            "TOP_DEPTH" => "1",	// Максимальная отображаемая глубина разделов
            "VIEW_MODE" => "LINE",	// Вид списка подразделов
        ),
            false
        );?>
    <?$APPLICATION->IncludeComponent(
        "bitrix:search.form",
        "search_blog",
        array(
            "USE_SUGGEST" => "N",
            "PAGE" => "#SITE_DIR#search/index.php",
            "COMPONENT_TEMPLATE" => "search_blog"
        ),
        false
    );?>
    <section class="blog-list-section">
        <div class="container container--mobile-fluid">
            <?$APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "blog_section_list_more",
                array(
                    "FIRST_ELEMENT" => "Y",
                    "ACTIVE_DATE_FORMAT" => "j F Y",
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
                    "DETAIL_URL" => "#SITE_DIR#/blog/#SECTION_CODE#/#CODE#/",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "DISPLAY_DATE" => "Y",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "Y",
                    "DISPLAY_PREVIEW_TEXT" => "Y",
                    "DISPLAY_TOP_PAGER" => "N",
                    "FIELD_CODE" => array(
                        0 => "ID",
                        1 => "CODE",
                        2 => "NAME",
                        3 => "SORT",
                        4 => "PREVIEW_TEXT",
                        5 => "PREVIEW_PICTURE",
                        6 => "DETAIL_TEXT",
                        7 => "DETAIL_PICTURE",
                        8 => "DATE_ACTIVE_FROM",
                        9 => "ACTIVE_FROM",
                        10 => "DATE_CREATE",
                        11 => "TIMESTAMP_X",
                        12 => "",
                    ),
                    "FILTER_NAME" => "",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "IBLOCK_ID" => "20",
                    "IBLOCK_TYPE" => "blog",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "MESSAGE_404" => "",
                    "NEWS_COUNT" => $newsCount,
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => "show_more",
                    "PAGER_TITLE" => "Блог",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "PREVIEW_TRUNCATE_LEN" => "",
                    "PROPERTY_CODE" => array(
                        0 => "READ_TIME",
                        1 => "",
                    ),
                    "SET_BROWSER_TITLE" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SHOW_404" => "N",
                    "SORT_BY1" => "ACTIVE_FROM",
                    "SORT_BY2" => "SORT",
                    "SORT_ORDER1" => "DESC",
                    "SORT_ORDER2" => "ASC",
                    "STRICT_SECTION_CHECK" => "N",
                    "COMPONENT_TEMPLATE" => "blog_section_list"
                ),
                false
            );?>
        </div>
    </section>
    <section class="section section--red new-videos-section">
        <div class="container container--mobile-fluid">
            <div class="row">
                <div class="col-sm-8 offset-sm-2 mb-5">
                    <h2 class="h2">Новые видео на&nbsp;YouTube</h2>
                </div>
            </div>
            <?$APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "new_videos",
                array(
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
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "DISPLAY_DATE" => "Y",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "N",
                    "DISPLAY_PREVIEW_TEXT" => "N",
                    "DISPLAY_TOP_PAGER" => "N",
                    "FIELD_CODE" => array(
                        0 => "ID",
                        1 => "NAME",
                        2 => "SORT",
                        3 => "DATE_ACTIVE_FROM",
                        4 => "ACTIVE_FROM",
                        5 => "DATE_ACTIVE_TO",
                        6 => "ACTIVE_TO",
                        7 => "DATE_CREATE",
                        8 => "TIMESTAMP_X",
                        9 => "",
                    ),
                    "FILTER_NAME" => "",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "IBLOCK_ID" => "21",
                    "IBLOCK_TYPE" => "blog",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "MESSAGE_404" => "",
                    "NEWS_COUNT" => "3",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => "show_more_white",
                    "PAGER_TITLE" => "Видео",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "PREVIEW_TRUNCATE_LEN" => "",
                    "PROPERTY_CODE" => array(
                        0 => "LINK",
                        1 => "",
                    ),
                    "SET_BROWSER_TITLE" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SHOW_404" => "N",
                    "SORT_BY1" => "ACTIVE_FROM",
                    "SORT_BY2" => "SORT",
                    "SORT_ORDER1" => "DESC",
                    "SORT_ORDER2" => "ASC",
                    "STRICT_SECTION_CHECK" => "N",
                    "COMPONENT_TEMPLATE" => "new_videos"
                ),
                false
            );?>
        </div>
    </section>
</main>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>