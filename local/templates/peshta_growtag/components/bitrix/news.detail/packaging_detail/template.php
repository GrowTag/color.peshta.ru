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
?>
<style>
    .catalog-section-detail-header, .biz-content {
        padding-left:16px;
        padding-right:16px;
    }
    .catalog-section-detail-cases h2 {
        margin-top: 0 !important;
    }
@media (max-width: 768px){
    .catalog-section-detail-cases h2 {
        margin-top: 0 !important;
    }
}
</style>
<section class="catalog-section-detail-header packaging-header-section-detail">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7 p-0">
                <div class="catalog-section-detail-header__title">
                    <h1><?=$arResult["NAME"]?></h1>
                </div>
                <div class="catalog-section-detail-header__description">
                    <?echo $arResult["PREVIEW_TEXT"];?>
                </div>
                <div class="catalog-section-detail-header__button">
                    <a href="#" data-toggle="modal" data-target="#modalOrderFeedback">Заказать</a>
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
</section>
<section class="biz-content">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <?=$arResult["DETAIL_TEXT"];?>
            </div>
        </div>
    </div>
</section>
<section class="packages-list-detail mt-4">
    <div class="container">
        <div class="row justify-content-center">
            <style>
                .cases-elements-list-slider .cases-elements-list__item {
                    overflow: hidden;
                    object-fit: cover;
                    max-height: 320px;
                    border-radius: 8px;
                }
                .cases-elements-list-slider .cases-elements-list__item:hover > .case-content-wrap {
                    top: -320px;
                }
                @media (max-width: 768px){
                    .cases-elements-list-slider .cases-elements-list__item {
                        border-radius: 0;
                    }
                }
            </style>
            <div class="cases-elements-list-slider row justify-content-center">
                <?foreach($arResult["PROPERTIES"]["CASES"]["VALUE"] as $key=>$arItem):?>
                    <div class="col-md-4 col-12 mb-4">
                        <div class="cases-elements-list__item">
                            <div class="cases-elements-list__item-img">
                                <img class="packaging" src="<?=CFile::getPath($arItem)?>" alt="<?echo $arItem["NAME"]?>">
                            </div>
                            <div class="case-content-wrap">
                                <p class="case-content__description">
                                    <?=$arResult["PROPERTIES"]["TEXT_FOR_CASES"]["~VALUE"][$key]["TEXT"]?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?endforeach;?>
            </div>
        </div>
    </div>
</section>
<section class="for-biz">
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="section-title">
                Для каких сфер бизнеса?
            </h2>
        </div>
        <div class="row">
            <?global $arFilterBiz;
            $arFilterBiz = array(
                "PROPERTY" => array(
                    "FOR_BIZ" => $arResult["ID"],
                )
            );?>
            <?$APPLICATION->IncludeComponent("bitrix:news.list", "packaging_for_biz_detail", Array(
	"ELEMENT" => $arResult["ID"],
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
		"DISPLAY_PICTURE" => "N",	// Выводить изображение для анонса
		"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"FIELD_CODE" => array(	// Поля
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "arFilterBiz",	// Фильтр
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
		"IBLOCK_ID" => "31",	// Код информационного блока
		"IBLOCK_TYPE" => "services",	// Тип информационного блока (используется только для проверки)
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
		"INCLUDE_SUBSECTIONS" => "N",	// Показывать элементы подразделов раздела
		"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
		"NEWS_COUNT" => "1000",	// Количество новостей на странице
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
			0 => "FOR_BIZ",
			1 => "IMAGE",
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
    </div>
</section>
<section class="support-steps">
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="section-title">Почему мы?</h2>
        </div>
        <div class="row justify-content-center">
            <?global $arFilterSteps;
            $arFilterSteps = array(
                "PROPERTY" => array(
                    "FOR_SUPPORT" => $arResult["ID"],
                )
            );?>
            <?$APPLICATION->IncludeComponent("bitrix:news.list", "support_steps_detail", Array(
                "ELEMENT" => $arResult["ID"],
                "FILTER_NAME" => "arFilterSteps",
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
                "DISPLAY_PICTURE" => "N",	// Выводить изображение для анонса
                "DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
                "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
                "FIELD_CODE" => array(	// Поля
                    0 => "",
                    1 => "",
                ),
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
                "IBLOCK_ID" => "30",	// Код информационного блока
                "IBLOCK_TYPE" => "services",	// Тип информационного блока (используется только для проверки)
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
                "INCLUDE_SUBSECTIONS" => "N",	// Показывать элементы подразделов раздела
                "MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
                "NEWS_COUNT" => "3",	// Количество новостей на странице
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
                    0 => "FOR_SUPPORT",
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
    </div>
</section>
<?if(is_array($arResult["PROPERTIES"]["IMAGES"]["VALUE"]) && !empty($arResult["PROPERTIES"]["IMAGES"]["VALUE"])):?>
    <div class="catalog-section-detail-cases p-0">
        <div class="row justify-content-center">
            <h2>
                Наше портфолио
            </h2>
        </div>
        <div class="container">
            <div class="catalog-section-detail-cases__list d-flex justify-content-center">
                <?foreach ($arResult["PROPERTIES"]["IMAGES"]["VALUE"] as $img):?>
                    <div class="list__item d-flex">
                        <img src="<?=CFile::GetPath($img);?>"/>
                    </div>
                <?endforeach;?>
            </div>
        </div>
        <div class="catalog-section-detail-cases__list d-flex mobile">
            <?foreach ($arResult["PROPERTIES"]["IMAGES"]["VALUE"] as $img):?>
                <div class="list__item d-flex">
                    <img src="<?=CFile::GetPath($img);?>"/>
                </div>
            <?endforeach;?>
        </div>
    </div>
<?endif;?>
<?global $arFilterCase;
$arFilterCase = array(
    "PROPERTY" => array(
        "FOR_PACKAGING" => $arResult["ID"],
    )
);?>
<?$APPLICATION->IncludeComponent("bitrix:news.list", "case_for_biz", Array(
    "ELEMENT" => $arResult["ID"],
    "FIRST_ELEMENT" => "N",
    "ACTIVE_DATE_FORMAT" => "j F Y",	// Формат показа даты
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
    "DETAIL_URL" => "#SITE_DIR#/cases/#CODE#/",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
    "DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
    "DISPLAY_DATE" => "Y",	// Выводить дату элемента
    "DISPLAY_NAME" => "Y",	// Выводить название элемента
    "DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
    "DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
    "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
    "FIELD_CODE" => array(	// Поля
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
    "FILTER_NAME" => "arFilterCase",	// Фильтр
    "HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
    "IBLOCK_ID" => "23",	// Код информационного блока
    "IBLOCK_TYPE" => "blog",	// Тип информационного блока (используется только для проверки)
    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
    "INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
    "MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
    "NEWS_COUNT" => "1000",	// Количество новостей на странице
    "PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
    "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
    "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
    "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
    "PAGER_TEMPLATE" => "show_more_cases",	// Шаблон постраничной навигации
    "PAGER_TITLE" => "Блог",	// Название категорий
    "PARENT_SECTION" => "",	// ID раздела
    "PARENT_SECTION_CODE" => "",	// Код раздела
    "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
    "PROPERTY_CODE" => array(	// Свойства
        0 => "VIDEO_LINK",
        1 => "FOR_BIZ",
        2 => "FOR_SUPPORT",
        3 => "BIG_IMAGE"
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
    "COMPONENT_TEMPLATE" => "blog_section_list"
),
    false
);?>
<?if($arResult["PROPERTIES"]["FORMS"]["VALUE_XML_ID"] == 2 || $arResult["PROPERTIES"]["FORMS"]["VALUE_XML_ID"] == "2"):?>
    <section class="feedback-packaging-detail">
        <div class="container">
            <div class="row justify-content-center">
                <h2 class="section-title">
                    Оставьте заявку
                </h2>
            </div>
            <div class="row justify-content-center align-items-center mb-5">
                <div class="section-description">
                    Наш менеджер свяжется с вами в течении 30 минут, а также отправит<br/>коммерческое предложение индивидуально под ваш проект.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="feedback-packaging-detail__red col-md-6 col-12">
                <div class="feedback-packaging-detail__title">
                    Заказать комплекс услуг
                </div>
                <div class="feedback-packaging-detail__description">
                    Проектирование конструкции упаковки + дизайн + печать
                </div>
                <?$APPLICATION->IncludeComponent(
                    "growtag:main.feedback",
                    "peshta_feedback_packaging_red",
                    array(
                        "USE_CAPTCHA" => "N",
                        "OK_TEXT" => "Заявка на обратный звонок успешно отправлена. Ожидайте звонка наших менеджеров.",
                        "EMAIL_TO" => "",
                        "REQUIRED_FIELDS" => array(
                            0 => "NAME",
                        ),
                        "EVENT_MESSAGE_ID" => array(
                            0 => "54",
                        ),
                        "COMPONENT_TEMPLATE" => "peshta_feedback_packaging_red",
                        "USER_CONSENT" => "N",
                        "USER_CONSENT_ID" => "0",
                        "USER_CONSENT_IS_CHECKED" => "Y",
                        "USER_CONSENT_IS_LOADED" => "N"
                    ),
                    false
                );?>
            </div>
            <div class="feedback-packaging-detail__white col-md-6 col-12">
                <div class="feedback-packaging-detail__title">
                    Заказать отдельные услуги
                </div>
                <div class="feedback-packaging-detail__description">
                    Только проектирование, только дизайн или только печать
                </div>
                <?$APPLICATION->IncludeComponent(
                    "growtag:main.feedback",
                    "peshta_feedback_packaging_white",
                    array(
                        "USE_CAPTCHA" => "N",
                        "OK_TEXT" => "Заявка на обратный звонок успешно отправлена. Ожидайте звонка наших менеджеров.",
                        "EMAIL_TO" => "",
                        "REQUIRED_FIELDS" => array(
                            0 => "NAME",
                        ),
                        "EVENT_MESSAGE_ID" => array(
                            0 => "55",
                        ),
                        "COMPONENT_TEMPLATE" => "peshta_feedback_packaging_white",
                        "USER_CONSENT" => "N",
                        "USER_CONSENT_ID" => "0",
                        "USER_CONSENT_IS_CHECKED" => "Y",
                        "USER_CONSENT_IS_LOADED" => "N"
                    ),
                    false
                );?>
            </div>
        </div>
    </section>
<?else:?>
    <section class="index-section-7">
        <div class="container">
            <div class="row align-items-center">
                <div class="index-section-7__text col-md-6">
                    <div class="index-section-7__title">
                        <span>Мы на связи</span>
                        Оставьте заявку и получите индивидуальную скидку на первый заказ
                    </div>
                </div>
                <div class="index-section-7__form col-md-6 p-5">
                    <div class="index-section-7__form-title">
                        Закажите расчет стоимости в 2 клика
                    </div>
                    <?$APPLICATION->IncludeComponent(
                        "growtag:main.feedback",
                        "peshta_feedback_index",
                        array(
                            "USE_CAPTCHA" => "N",
                            "OK_TEXT" => "Заявка на обратный звонок успешно отправлена. Ожидайте звонка наших менеджеров.",
                            "EMAIL_TO" => "",
                            "REQUIRED_FIELDS" => array(
                                0 => "NAME",
                            ),
                            "EVENT_MESSAGE_ID" => array(
                                0 => "26",
                            ),
                            "COMPONENT_TEMPLATE" => "peshta_feedback_index",
                            "USER_CONSENT" => "N",
                            "USER_CONSENT_ID" => "0",
                            "USER_CONSENT_IS_CHECKED" => "Y",
                            "USER_CONSENT_IS_LOADED" => "N"
                        ),
                        false
                    );?>
                </div>
            </div>
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

