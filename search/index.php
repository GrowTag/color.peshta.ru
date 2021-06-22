<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("ПЕШТА - Поиск по сайту");?>
	<section class="faq-section-1">
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="faq-section-1__title">
					<h1>Поиск по сайту</h1>
				</div>
			</div>
		</div>
	</section>
<?$APPLICATION->IncludeComponent(
	"bitrix:search.page", 
	"search_page", 
	array(
		"RESTART" => "Y",
		"CHECK_DATES" => "Y",
		"arrWHERE" => array(
			0 => "iblock_blog",
			1 => "iblock_catalog",
		),
		"arrFILTER" => array(
			0 => "iblock_services",
			1 => "iblock_blog",
			2 => "iblock_catalog",
		),
		"SHOW_WHERE" => "Y",
		"PAGE_RESULT_COUNT" => "10",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"TAGS_SORT" => "NAME",
		"TAGS_PAGE_ELEMENTS" => "20",
		"TAGS_PERIOD" => "",
		"TAGS_URL_SEARCH" => "",
		"TAGS_INHERIT" => "Y",
		"SHOW_RATING" => "N",
		"FONT_MAX" => "50",
		"FONT_MIN" => "10",
		"COLOR_NEW" => "000000",
		"COLOR_OLD" => "C8C8C8",
		"PERIOD_NEW_TAGS" => "",
		"SHOW_CHAIN" => "Y",
		"COLOR_TYPE" => "Y",
		"WIDTH" => "100%",
		"PATH_TO_USER_PROFILE" => "#SITE_DIR#people/user/#USER_ID#/",
		"COMPONENT_TEMPLATE" => "search_page",
		"NO_WORD_LOGIC" => "N",
		"USE_TITLE_RANK" => "N",
		"DEFAULT_SORT" => "rank",
		"FILTER_NAME" => "",
		"arrFILTER_iblock_services" => array(
			0 => "23",
			1 => "25",
			2 => "28",
		),
		"arrFILTER_iblock_blog" => array(
			0 => "all",
		),
		"arrFILTER_iblock_catalog" => array(
			0 => "9",
			1 => "18",
		),
		"SHOW_WHEN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"USE_LANGUAGE_GUESS" => "Y",
		"USE_SUGGEST" => "N",
		"RATING_TYPE" => "",
		"DISPLAY_TOP_PAGER" => "Y",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Результаты поиска",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => ""
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>