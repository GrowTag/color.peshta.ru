<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="menu-head-list col-8 pt-4 pl-0">
    <div class="d-flex universal-head-menu">
        <a style="width: 100% !important;" itemprop="url" href="/digital/" >
            <div class="link__title" style="color: #FA3F3F;">Пешта Digital</div>
        </a>
        <a style="width: 100% !important;" itemprop="url" href="/contacts/">
            <div class="link__title">Контакты</div>
        </a>
        <a style="width: 100% !important;" itemprop="url" href="/faq/">
            <div class="link__title">Часто задаваемые вопросы</div>
        </a>
    </div>
    <div class="faq-menu-link">
        <img src="<?=SITE_TEMPLATE_PATH?>/images/vopros.svg" alt="FAQ">&nbsp;Возникли трудности? Посмотрите&nbsp;<a
            href="/faq/">часто задаваемые вопросы</a>.
    </div>
</div>
<div class="menu-head-blog col-4">
    <div class="menu-head-blog__title">
        Блог о полиграфии и бизнесе
    </div>
    <div class="menu-head-blog__content">
        <?$APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "blog_section_list_head_menu",
            array(
                "FIRST_ELEMENT" => "N",
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
                "DISPLAY_BOTTOM_PAGER" => "N",
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
                "NEWS_COUNT" => "1",
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
        <div class="row">
            <div class="col-12">
                <a href="/blog/" class="btn btn--outline-red">ВСЕ НОВОСТИ</a><br/>
            </div>
        </div>
    </div>
</div>