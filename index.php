<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Типография \"ПЕШТА\" печатает полиграфическую продукцию в Ижевске. +7 (3412) 400-200");
$APPLICATION->SetPageProperty("keywords", "типография, ижевск, визитки, фирменный стиль, заказать визитки, упаковка, печать, штампы, буклеты, полиграфия, нумераторы, полиграфия для бизнеса");
$APPLICATION->SetPageProperty("title", "ПЕШТА - Типография Ижевск");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetTitle("Пешта");
?><section class="index-section-1">
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"catalog_stocks",
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
		"COMPONENT_TEMPLATE" => "catalog_stocks",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "7",
		"IBLOCK_TYPE" => "catalog",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MEDIA_PROPERTY" => "",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "100",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Акции",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"LINK",1=>"BACKGROUND_IMAGE",2=>"LINK_TITLE",),
		"SEARCH_PAGE" => "/search/",
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
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
);?> </section> <section class="index-section-2">
<div class="container">
	<div class="row justify-content-center">
		<h2>Мы делаем</h2>
	</div>
	<div class="row">
		 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"index_catalog_section",
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
		"NEWS_COUNT" => "12",
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
	<div class="row justify-content-center">
 <a href="/catalog/" class="index-section-link">Смотреть всю продукцию &gt;</a>
	</div>
</div>
 </section> <section class="index-section-3">
<div class="container">
	<div class="row justify-content-center">
		<div class="index-section-3__title">
			<h2>
			Будьте впереди конкурентов с<br>
			программой Пешта Digital </h2>
		</div>
	</div>
	<div class="row justify-content-center mt-4">
		<div class="index-section-3__content">
			<div class="row">
				<div class="col-md-4">
					<div class="index-section-3__content-title">
						 Скорость
					</div>
					<div class="index-section-3__content-desc mt-3">
						 Цифровая печать <strong>от 60 минут.</strong>
					</div>
				</div>
				<div class="col-md-4">
					<div class="index-section-3__content-title">
						 Выгода
					</div>
					<div class="index-section-3__content-desc mt-3">
						 Экономия <strong>до 30%</strong>
						на цифровых заказах.
					</div>
				</div>
				<div class="col-md-4">
					<div class="index-section-3__content-title">
						 Персонализация
					</div>
					<div class="index-section-3__content-desc mt-3">
						 Обращайтесь к вашим клиентам напрямую.
					</div>
				</div>
			</div>
			<div class="index-section-3__content-btn row justify-content-center mt-5">
 <a href="/digital/" class="white-button">Подробнее</a>
			</div>
		</div>
	</div>
</div>
 </section> <section class="index-section-4">
<div class="container">
	<div class="row justify-content-center">
		<div class="index-section__title">
			<h2>Индивидуальные решения для вашего бизнеса</h2>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="index-section__description">
			 Готовые наборы и специальные акции, разработанные конкретно под ваш бизнес
		</div>
	</div>
	<div class="row">
		 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"index_biz_section",
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
		"IBLOCK_ID" => "9",
		"IBLOCK_TYPE" => "catalog",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MEDIA_PROPERTY" => "",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "8",
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
	<div class="row justify-content-center">
 <a href="/biz/" class="index-section-link">Смотреть все направления &gt;</a>
	</div>
</div>
 </section> <section class="index-section-5">
<div class="container">
	<div class="row justify-content-center">
		<div class="index-section__title">
			<h2>Почему работать с типографией Пешта удобно и выгодно?</h2>
		</div>
	</div>
	<div class="row index-section-5__content">
		<div class="col-md-3 col-sm-12 p-4">
			<div class="index-section-5__content-icon">
 <img src="/local/templates/peshta_growtag/images/fast.svg" alt="Оперативность">
			</div>
			<div class="index-section-5__content-title mt-3">
				<h3>Оперативность</h3>
			</div>
			<div class="index-section-5__content-text mt-3">
				 Благодаря современному оборудованию и налаженной системе производства, мы обеспечиваем для вас высокую скорость печати
			</div>
		</div>
		<div class="col-md-3 col-sm-12 p-4">
			<div class="index-section-5__content-icon">
 <img src="/local/templates/peshta_growtag/images/wallet.svg" alt="Экономия">
			</div>
			<div class="index-section-5__content-title mt-3">
				<h3>Экономия</h3>
			</div>
			<div class="index-section-5__content-text mt-3">
				 За счет программы Пешта Digital и профессионализма сотрудников, мы находим для вас оптимальный вариант решения для печати, который позволяет вам экономить, не отражаясь на качестве
			</div>
		</div>
		<div class="col-md-3 col-sm-12 p-4">
			<div class="index-section-5__content-icon">
 <img alt="Большой опыт" src="/local/templates/peshta_growtag/images/check-mark.svg">
			</div>
			<div class="index-section-5__content-title mt-3">
				<h3>Большой опыт</h3>
			</div>
			<div class="index-section-5__content-text mt-3">
				 Группа компаний Пешта уже 28 лет на рынке полиграфических услуг. За все это время мы зарекомендовали себя как надежная и уверенная компания
			</div>
		</div>
		<div class="col-md-3 col-sm-12 p-4">
			<div class="index-section-5__content-icon">
 <img alt="Особый подход" src="/local/templates/peshta_growtag/images/diamond.svg">
			</div>
			<div class="index-section-5__content-title mt-3">
				<h3>Особый подход</h3>
			</div>
			<div class="index-section-5__content-text mt-3">
				 К каждому клиенту мы подходим индивидуально, предлагаем решения, которые подойдут именно для вашей сферы бизнеса. Оперативно отвечаем и помогаем на каждом этапе работы
			</div>
		</div>
	</div>
</div>
 </section> <section class="index-section-6">
<div class="container">
	<div class="row justify-content-center">
		<div class="index-section__title">
			<h2>Отзывы о нашей работе</h2>
		</div>
	</div>
	<div class="row">
		<div class="reviews-slider">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"fiz_reviews",
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
		"COMPONENT_TEMPLATE" => "fiz_reviews",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "8",
		"IBLOCK_TYPE" => "catalog",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MEDIA_PROPERTY" => "",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "8",
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
		"PROPERTY_CODE" => array(0=>"SERVICE",1=>"",),
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
</div>
 </section>
<section class="index-section-7" id="index-section-7">
    <div class="container">
        <div class="row align-items-center">
            <div class="index-section-7__text col-md-6">
                <div class="index-section-7__title">
                    <span>Мы на связи</span>
                    Закажите расчет и мы свяжемся с вами в течение 30 минут
                </div>
            </div>
            <div class="index-section-7__form col-md-6 p-5">
                <div class="index-section-7__form-title">
                    Закажите расчет стоимости в 2 клика
                </div>
                <?$APPLICATION->IncludeComponent(
                    "growtag:main.feedback",
                    "peshta_feedback_index",
                    Array(
                        "COMPONENT_TEMPLATE" => "peshta_feedback_index",
                        "EMAIL_TO" => "",
                        "EVENT_MESSAGE_ID" => array(0=>"26",),
                        "OK_TEXT" => "Заявка на обратный звонок успешно отправлена. Ожидайте звонка наших менеджеров.",
                        "REQUIRED_FIELDS" => array(0=>"NAME",),
                        "USER_CONSENT" => "N",
                        "USER_CONSENT_ID" => "0",
                        "USER_CONSENT_IS_CHECKED" => "Y",
                        "USER_CONSENT_IS_LOADED" => "N",
                        "USE_CAPTCHA" => "N"
                    )
                );?>
            </div>
        </div>
    </div>
</section>
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
	Array(
		"COMPONENT_TEMPLATE" => "peshta_subscribe",
		"EMAIL_TO" => "",
		"EVENT_MESSAGE_ID" => array(0=>"34",),
		"EVENT_MESSAGE_ID_OUT" => "35",
		"OK_TEXT" => "Заявка на обратный звонок успешно отправлена. Ожидайте звонка наших менеджеров.",
		"REQUIRED_FIELDS" => array(0=>"NAME",),
		"RUB_ID" => "1",
		"USER_CONSENT" => "N",
		"USER_CONSENT_ID" => "0",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N",
		"USE_CAPTCHA" => "N"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
