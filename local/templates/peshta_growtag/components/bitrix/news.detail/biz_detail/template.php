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
<div class="catalog-section-detail-header biz-detail-header">
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
                    <a href="#" data-target="#modalSettlement" data-toggle="modal">Заказать</a>
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
<div class="biz-content">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <h2>Выведи бизнес на новый уровень</h2>
        </div>
        <div class="row biz-content-rows">
            <div class="col-md-7 col-sm-12 mt-4">
                <?=$arResult["DETAIL_TEXT"];?>
            </div>
            <div class="biz-steps-wrap col-md-5 col-sm-12">
                <div class="biz-steps mobile">
                    <div class="step">
                        <div class="step__img">
                            <img src="<?=SITE_TEMPLATE_PATH?>/images/1step-biz.png">
                        </div>
                        <div class="step_desc">
                            Сбор данных и анализ<br/>вашего бизнеса
                        </div>
                    </div>
                    <div class="step">
                        <div class="step__img">
                            <img src="<?=SITE_TEMPLATE_PATH?>/images/2step-biz.png">
                        </div>
                        <div class="step_desc">
                            Разработка комплексного решения<br/>вашей задачи с помощью<br/>полиграфических материалов
                        </div>
                    </div>
                    <div class="step">
                        <div class="step__img">
                            <img src="<?=SITE_TEMPLATE_PATH?>/images/3step-biz.png">
                        </div>
                        <div class="step_desc">
                            Полная реализация проекта
                        </div>
                    </div>
                </div>
                <div class="biz-steps">
                    <div class="step">
                        <div class="step__img">
                            <img src="<?=SITE_TEMPLATE_PATH?>/images/1step-biz.png">
                        </div>
                        <div class="step_desc">
                            Сбор данных и анализ<br/>вашего бизнеса
                        </div>
                    </div>
                    <div class="step">
                        <div class="step__img">
                            <img src="<?=SITE_TEMPLATE_PATH?>/images/2step-biz.png">
                        </div>
                        <div class="step_desc">
                            Разработка комплексного решения<br/>вашей задачи с помощью<br/>полиграфических материалов
                        </div>
                    </div>
                    <div class="step">
                        <div class="step__img">
                            <img src="<?=SITE_TEMPLATE_PATH?>/images/3step-biz.png">
                        </div>
                        <div class="step_desc">
                            Полная реализация проекта
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="tasks-section mt-5">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <h2>Пешта помогает с любыми<br/>поставленными задачами</h2>
        </div>
        <?$APPLICATION->IncludeComponent("bitrix:news.list", "tasks_biz_detail", Array(
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
            "FILTER_NAME" => "",	// Фильтр
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
            "IBLOCK_ID" => "24",	// Код информационного блока
            "IBLOCK_TYPE" => "services",	// Тип информационного блока (используется только для проверки)
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
            "INCLUDE_SUBSECTIONS" => "N",	// Показывать элементы подразделов раздела
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
                0 => "ITEMS",
                1 => "BIZ",
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
<?if(is_array($arResult["PROPERTIES"]["IMAGES"]["VALUE"]) && !empty($arResult["PROPERTIES"]["IMAGES"]["VALUE"])):?>
    <div class="catalog-section-detail-cases p-0">
        <div class="row justify-content-center">
            <h2>
                Наши работы
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
<?global $arFilterBiz;
$arFilterBiz = array(
    "PROPERTY" => array(
        "FOR_BIZ" => $arResult["ID"],
    )
);?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"case_for_biz", 
	array(
		"ELEMENT" => $arResult["ID"],
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
		"CACHE_TYPE" => "N",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "#SITE_DIR#/cases/#CODE#/",
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
		"FILTER_NAME" => "arFilterBiz",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "23",
		"IBLOCK_TYPE" => "services",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "1000",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "show_more_cases",
		"PAGER_TITLE" => "Блог",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "VIDEO_LINK",
			1 => "FOR_BIZ",
			2 => "",
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
		"COMPONENT_TEMPLATE" => "case_for_biz"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
);?>
<br/><br/>
