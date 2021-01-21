<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О нас");
?>
<div id="pagepiling">
    <div class="section questions-section pp-scrollable">
        <div class="row">
            <div class="container">
                <h1 class="section__title">Вопросы и ответы</h1>
            </div>
            <div class="section__description-row">
                <div class="container">
                    <h3>Мы накопили много опыта и сейчас<br/>можем ответить на самые часто задаваемые вопросы</h3>
                    <i class="i-tab-qest-desc"></i>
                </div>
            </div>
            <div class="section__content container">
                <?$APPLICATION->IncludeComponent("bitrix:news.list", "faq", Array(
	"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
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
		"IBLOCK_ID" => "5",	// Код информационного блока
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
			0 => "",
			1 => "",
		),
		"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
		"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
		"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
	),
	false
);?>
            </div>
        </div>
    </div>
    <div class="section pp-scrollable">
        <div class="row">
            <div class="container">
                <h2 class="section__title">Вы можете заполнить и отправить нам свою визитную карточку</h2>
                <div class="section__content">
                    <div class="feedback-card row">
                        <div class="col-md-7 col-sm-12">
                            <input type="text" name="user_name" placeholder="Ваше имя"/>
                            <label for="user_email">Email <input type="text" name="user_email" placeholder="Ваш Email"/></label>
                            <label for="user_phone">Тел. <input type="text" name="user_phone" placeholder="Ваш телефон"/></label>
                        </div>
                    </div>
                </div>
                <a href="#" class="section__button feedback-card__button btn">Отправить</a>
            </div>
        </div>
    </div>
</div>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".advantages").scroll(function () {
                //$(".advantages__item").each(function(){
                if ($(".advantages").scrollTop() > 0 && $(".advantages").scrollTop() < 100 ) {
                    $(".advantages__item-1").addClass("active");
                } else {
                    $(".advantages__item-1").removeClass("active");
                }
                if ($(".advantages").scrollTop() > 100 && $(".advantages").scrollTop() < 250 ) {
                    $(".advantages__item-2").addClass("active");
                } else {
                    $(".advantages__item-2").removeClass("active");
                }
                if ($(".advantages").scrollTop() > 250) {
                    $(".advantages__item-3").addClass("active");
                } else {
                    $(".advantages__item-3").removeClass("active");
                }
                //});
            });
            $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: false,
                autoplay: true,
                asNavFor: '.slider-nav',
            });
            $('.slider-nav').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                asNavFor: '.slider-for',
                dots: false,
                centerMode: true,
                focusOnSelect: true,
                autoplay: true,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 6,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: false
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1,
                            dots: false
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            dots: false
                        }
                    }],
            });
        });
    </script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
