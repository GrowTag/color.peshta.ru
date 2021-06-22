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
$arParams["DATE_CREATE"]="j F Y";
?>
<?
/* Фильтр записей инфоблока
(если используется рабиение по разделам,
то к фильтру нужно добавить
"SECTION_ID" => $arResult['IBLOCK_SECTION_ID']) */
$section = CIBlockSection::GetByID($arResult["IBLOCK_SECTION_ID"]);

if($arSection = $section->GetNext()){
    $secCode = $arSection['CODE'];
}

$arFilter = array("IBLOCK_ID" => $arResult['IBLOCK_ID']);
// Выбиреам записи
$rs = CIBlockElement::GetList(array("SORT"=>"ASC"),$arFilter,false,false,array('ID','NAME','CODE','DETAIL_PAGE_URL'));
$i=0;
while ($ar = $rs -> GetNext()) {
    $arNavi[$i] = $ar;
    // Если ID полученной записи равен ID новости которая отображается, то запоминаем ее номер
    if ($ar['ID'] == $arResult['ID']) $iCurPos = $i;
    $i++;
}
// Заполняем массив информацией о следующей и предыдущей записи
// Ключ предыдущего элемента будет [$iCurPos - 1]
// Ключ следующего элемента будет [$iCurPos + 1]
// Если элементы массива с этими ключами существуют то сохраняем их, иначе осталяем пустыми
// $arLink - массив со ссылками на след и предыд новости
$arLink = array();
$arLink['PREVIOUS'] = isset($arNavi[$iCurPos - 1]) ? $arNavi[$iCurPos - 1] : '';
$arLink['NEXT'] = isset($arNavi[$iCurPos+1]) ? $arNavi[$iCurPos+1] : '';

$videoLink = explode('=', $arResult["PROPERTIES"]["VIDEO_LINK"]["VALUE"])[1];
?>
<main class="site-main">
    <header class="page-header detail-header" style="background: url(<?=$arResult["DETAIL_PICTURE"]["SRC"]?>) no-repeat center;background-size: cover;">
        <h1 class="page-header__h1 h1"><?=$arResult["NAME"]?></h1>
        <div class="page-header__description">
            <?=$arResult["PROPERTIES"]["DESCRIPTION"]["~VALUE"]["TEXT"];?>
        </div>
    </header>
    <section class="page-detail">
        <div class="container">
            <div class="row justify-content-center">
                <div class="page-detail__text">
                    <?echo $arResult["DETAIL_TEXT"];?>
                </div>
            </div>
            <div class="row page-detail__bottom">
                <div class="col-6 col-md-4">
                    <?
                    // Если есть предыдущий элемент то выводим ссылку
                    if (is_array($arLink['PREVIOUS']))
                    {
                        echo '<a href="/cases/'.$arLink["PREVIOUS"]["CODE"].'/">Предыдущий кейс</a>';
                    }?>
                </div>
                <div class="col-6 col-md-4">

                </div>
                <div class="col-6 col-md-4">
                    <?
                    // Если есть следущий элемент то выводим ссылку
                    if (is_array($arLink['NEXT']))
                    {
                        echo '<a href="/cases/'.$arLink['NEXT']['CODE'].'/">Следующий кейс</a>';
                    }?>
                </div>
            </div>
            <div class="row comments">
                <?$APPLICATION->IncludeComponent(
	"khayr:main.comment",
	"comments_growtag",
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADDITIONAL" => array(
		),
		"ALLOW_RATING" => "N",
		"AUTH_PATH" => "/personal/",
		"CAN_MODIFY" => "Y",
		"COUNT" => "100",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"JQUERY" => "Y",
		"LEGAL" => "N",
		"LEGAL_TEXT" => "Я согласен с правилами размещения сообщений на сайте.",
		"LOAD_AVATAR" => "N",
		"LOAD_DIGNITY" => "N",
		"LOAD_FAULT" => "N",
		"LOAD_MARK" => "N",
		"MAX_DEPTH" => "2",
		"MODERATE" => "Y",
		"NON_AUTHORIZED_USER_CAN_COMMENT" => "N",
		"OBJECT_ID" => $arResult["ID"],
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "",
		"REQUIRE_EMAIL" => "Y",
		"USE_CAPTCHA" => "N",
		"COMPONENT_TEMPLATE" => "comments_growtag"
	),
	false
);?>
            </div>
        </div>
    </section>
</main>
