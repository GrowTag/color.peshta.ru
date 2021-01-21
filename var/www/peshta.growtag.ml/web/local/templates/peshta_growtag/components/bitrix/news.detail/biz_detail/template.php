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
<div class="catalog-detail-title row justify-content-center">
    <h1><a href="/biz/#biz-catalog-section"><i class="fas fa-chevron-left" style="color: #fa3f3f;" title="Назад в каталог"></i></a><?=$arResult["NAME"]?></h1>
</div>
<div class="detail-biz-section mb-4" style="padding-top: 0px;background: url(<?=$arResult["DETAIL_PICTURE"]["SRC"]?>) no-repeat;">
    <div class="container">
        <div class="row">
            &nbsp;
        </div>
    </div>
</div>
<div class="row">
    <div class="row mobile-catalog-detail-title mb-4">
        <h1><a href="/biz/#biz-catalog-section"><i class="fas fa-chevron-left" style="color: #fa3f3f;" title="Назад в каталог"></i></a>&nbsp;<?=$arResult["NAME"]?></h1>
    </div>
</div>
<div class="row">
    <div class="container-sm">
        <div class="detail-biz-section__text col-md-12">
            <p>
                <?if(strlen($arResult["DETAIL_TEXT"])>0):?>
                    <?echo $arResult["DETAIL_TEXT"];?>
                <?else:?>
                    <?echo $arResult["PREVIEW_TEXT"];?>
                <?endif?>
            </p>
        </div>
    </div>
</div>
<div class="section-advantages-catalog">
    <div class="container">
        <div class="row">
            <div class="advantages__item advantages__item-1 col-md-6 col-sm-12">
                <div class="advantages__item-img col-md-4 col-sm-3 col-xs-12 align-self-center">
                    <img src="/local/templates/peshta_growtag/images/advantage_1.png"><br>
                </div>
                <div class="advantages__item-content col-md-8 col-sm-9 col-xs-12 align-self-center">
                    <div class="advantages__item-header">
                        Заботливый подход
                    </div>
                    <div class="advantages__item-text">
                        От идеи на стратегическом уровне до дизайна, подбора материалов и технологий.
                    </div>
                </div>
            </div>
            <div class="advantages__item advantages__item-3 col-md-6 col-sm-12">
                <div class="advantages__item-img col-md-4 col-sm-3 col-xs-12 align-self-center">
                    <img src="/local/templates/peshta_growtag/images/advantage_3.png"><br>
                </div>
                <div class="advantages__item-content col-md-8 col-sm-9 col-xs-12 align-self-center">
                    <div class="advantages__item-header">
                        Разумный подход
                    </div>
                    <div class="advantages__item-text">
                        Минимально возможные затраты времени, денег и энергии со стороны Заказчика, не зависимо от сложности задачи.
                    </div>
                </div>
            </div>
            <div class="advantages__item advantages__item-2 col-md-6 col-sm-12">
                <div class="advantages__item-img col-md-4 col-sm-3 col-xs-12 align-self-center">
                    <img src="/local/templates/peshta_growtag/images/advantage_2.png"><br>
                </div>
                <div class="advantages__item-content col-md-8 col-sm-9 col-xs-12 align-self-center">
                    <div class="advantages__item-header">
                        Гибкий подход
                    </div>
                    <div class="advantages__item-text">
                        Гибкость в подходе к решению задач и оптимизация проекта на всех стадиях производства с двойным контролем качества.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-cases">
    <?$APPLICATION->IncludeComponent("bitrix:news.list", "catalog_cases_biz", Array(
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
        "IBLOCK_ID" => "11",	// Код информационного блока
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
        "PARENT_SECTION" => $arResult["PROPERTIES"]["CASES"]["VALUE"],	// ID раздела
        "PARENT_SECTION_CODE" => "",	// Код раздела
        "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
        "PROPERTY_CODE" => array(	// Свойства
            0 => "PICTURES",
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
        "STRICT_SECTION_CHECK" => "Y",	// Строгая проверка раздела для показа списка
    ),
        false
    );?>
</div>
