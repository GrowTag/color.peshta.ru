<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Для бизнеса");
?>
<div class="section for-biz-section d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="container">
            <h1 class="section__title">Решаем задачи бизнеса,<br/>печатая материалы</h1>
            <br/><br/><br/><br/>
            <a href="#" data-target="#modalSettlement" data-toggle="modal" class="section__button btn">Заказать</a>
        </div>
    </div>
</div>
<div class="biz-catalog-section">
    <div class="row">
        <div class="container-sm">
            <h2 class="catalog-section__title">Мы работаем с разным бизнесом</h2>
        </div>
    </div>
    <?$APPLICATION->IncludeComponent("bitrix:news.list", "catalog_biz", Array(
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
		"IBLOCK_ID" => "9",	// Код информационного блока
		"IBLOCK_TYPE" => "catalog",	// Тип информационного блока (используется только для проверки)
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
		"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
		"MEDIA_PROPERTY" => "",	// Свойство для отображения медиа
		"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
		"NEWS_COUNT" => "200",	// Количество новостей на странице
		"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
		"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
		"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
		"PAGER_TITLE" => "Каталог",	// Название категорий
		"PARENT_SECTION" => "",	// ID раздела
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
</div>
<div class="section-reviews mt-5 mb-4">
    <div class="container">
        <h2 class="section-reviews__title">Отзывы юридических лиц<br>о нашей работе</h2>
        <div class="reviews-slider">
            <?$APPLICATION->IncludeComponent("bitrix:news.list", "fiz_reviews", Array(
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
                "IBLOCK_ID" => "10",	// Код информационного блока
                "IBLOCK_TYPE" => "services",	// Тип информационного блока (используется только для проверки)
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
                "INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
                "MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
                "NEWS_COUNT" => "2000",	// Количество новостей на странице
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
                    0 => "SERVICE",
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
</div>
<section class="index-section-8">
    <div class="container">
        <div class="row justify-content-center">
            <div class="index-section__title">
                <h2>Мы работаем с профессионалами своего дела</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <?$APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "index_clients",
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
                    "IBLOCK_ID" => "13",
                    "IBLOCK_TYPE" => "catalog",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "MEDIA_PROPERTY" => "",
                    "MESSAGE_404" => "",
                    "NEWS_COUNT" => "15",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => ".default",
                    "PAGER_TITLE" => "Каталог",
                    "PARENT_SECTION" => "",
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
</section>
<?$APPLICATION->IncludeComponent(
    "growtag:main.feedback",
    "peshta_subscribe",
    array(
        "RUB_ID" => "1",
        "USE_CAPTCHA" => "N",
        "OK_TEXT" => "Заявка на обратный звонок успешно отправлена. Ожидайте звонка наших менеджеров.",
        "EMAIL_TO" => "",
        "REQUIRED_FIELDS" => array(
            0 => "NAME",
        ),
        "EVENT_MESSAGE_ID" => array(
            0 => "34",
        ),
        "EVENT_MESSAGE_ID_OUT" => "35",
        "COMPONENT_TEMPLATE" => "peshta_subscribe",
        "USER_CONSENT" => "N",
        "USER_CONSENT_ID" => "0",
        "USER_CONSENT_IS_CHECKED" => "Y",
        "USER_CONSENT_IS_LOADED" => "N"
    ),
    false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
