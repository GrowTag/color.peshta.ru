<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
global $USER;
$APPLICATION->SetTitle("Личный кабинет")
?><div class="personal-section mb-4 pt-2">
	<div class="container">
		<div class="row">
			<div class="personal-section__content col-md-8">
				<div class="personal-section__content-stamp d-flex justify-content-center align-items-center">
					<div class="stamp-image">
						<div class="image-wrap">
							<span>120</span>
                            <img alt="Digital" src="/local/templates/peshta_growtag/images/giftbox.svg">
						</div>
					</div>
					<div class="stamp-content">
						<div class="stamp-content__title">
							 Экономьте&nbsp;с программой Пешта Digital
						</div>
						<div class="stamp-content__text">
							 На данный момент вы накопили 120 оттисков, стоимостью ХХ руб за оттиск. Накопите еще 30 оттисков, чтобы закрепить за собой стоимость 20 руб за оттиск
						</div>
					</div>
				</div>
				<h2>Ваши заказы</h2>
				<br>
				<div class="personal-section__content-orders">
					<div class="order">
						<div class="order__header d-flex justify-content-between">
							<div class="d-flex order__header-title">
								Заказ № 126643 / Имя заказа
							</div>
							<div class="d-flex order__header-status">
								В работе
							</div>
						</div>
                        <div class="order__date d-flex">
                            от 20.11.2020, 12:52
                        </div>
                        <div class="order__details">
                            <div>Тираж: 1000шт</div>
                            <div>Тиснение: Да</div>
                            <div>Размер: 120х60</div>
                            <div>Ламинация: Да</div>
                            <div>Наличие маета: Да (<a href="#">смотреть макет</a>)</div>
                        </div>
                        <div class="order__sum d-flex justify-content-between align-items-center">
                            <div class="d-flex">Итого</div>
                            <div class="d-flex">5000 ₽</div>
                        </div>
                        <div class="order__buttons d-flex justify-content-between align-items-center">
                            <a href="#">Удалить заказ</a>
                            <a href="#">Дублировать заказ</a>
                        </div>
					</div>
					 <?/*$APPLICATION->IncludeComponent(
	"bitrix:sale.personal.order.list",
	"peshta_order_list",
	array(
		"STATUS_COLOR_N" => "green",
		"STATUS_COLOR_P" => "yellow",
		"STATUS_COLOR_F" => "gray",
		"STATUS_COLOR_PSEUDO_CANCELLED" => "red",
		"PATH_TO_DETAIL" => "order_detail.php?ID=#ID#",
		"PATH_TO_COPY" => "basket.php",
		"PATH_TO_CANCEL" => "order_cancel.php?ID=#ID#",
		"PATH_TO_BASKET" => "basket.php",
		"PATH_TO_PAYMENT" => "payment.php",
		"ORDERS_PER_PAGE" => "20",
		"ID" => $ID,
		"SET_TITLE" => "Y",
		"SAVE_IN_SESSION" => "Y",
		"NAV_TEMPLATE" => "",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "3600",
		"CACHE_GROUPS" => "Y",
		"HISTORIC_STATUSES" => array(
			0 => "F",
		),
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"COMPONENT_TEMPLATE" => "peshta_order_list",
		"PATH_TO_CATALOG" => "/catalog/",
		"DISALLOW_CANCEL" => "N",
		"RESTRICT_CHANGE_PAYSYSTEM" => array(
			0 => "0",
		),
		"REFRESH_PRICES" => "N",
		"DEFAULT_SORT" => "STATUS"
	),
	false
);*/?>
				</div>
			</div>
			<div class="personal-section__sidebar col-md-4">
				<div class="personal-section__sidebar-title col-12">
					<div class="user-avatar">
                        <img alt="<?=$USER->GetFullName();?>" src="/local/templates/peshta_growtag/images/user.svg">
					</div>
					 <?=$USER->GetFullName();?><br>
                     <span>@<?=$USER->GetLogin();?></span>
				</div>
				<div class="personal-section__sidebar-order-content col-12">
                     <a href="/personal/profile/" class="personal-section__sidebar-order-content_button">Редактировать профиль</a> <a href="/personal/?logout=yes" class="personal-section__sidebar-order-content_button-gray">Выход</a>
				</div>
			</div>
		</div>
	</div>
</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
