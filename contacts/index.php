<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Адрес и телефоны типографии Пешта");
$APPLICATION->SetPageProperty("title", "Контакты | Типография Пешта");
$APPLICATION->SetTitle("Контакты");
?><div class="section-contacts">
	<div class="row">
		<div class="container-sm text-align-center">
			<h1 class="section__title">Контакты</h1>
			<br>
			<div class="row">
				<div class="col-md-4">
					<ul>
						<li> <b>Приемная</b><br>
 <i class="fas fa-phone-alt"></i>&nbsp;<a href="tel:+73412400200">+7 (3412) 400-200</a><br>
 <i class="fas fa-envelope"></i>&nbsp;<a href="mailto:info@peshta.ru">info@peshta.ru</a> </li>
					</ul>
				</div>
				<div class="col-md-4">
					<ul>
						<li> <b>Снабжение</b><br>
 <i class="fas fa-envelope"></i>&nbsp;<a href="mailto:snab-ofset@peshta.ru">snab-ofset@peshta.ru</a> </li>
					</ul>
				</div>
				<div class="col-md-4">
					<ul>
						<li> <b>Бухгалтерия</b><br>
 <i class="fas fa-phone-alt"></i>&nbsp;Внутр. 111 </li>
					</ul>
				</div>
			</div>
			<div class="row mt-5">
				<p style="width: 100%;font-size: 18px;">
					<b>Специалисты департамента по работе с ключевыми клиентами</b>
				</p>
				<div class="col-md-4">
					<ul>
						<li>
						Анна Лушникова<br>
 <i class="fas fa-phone-alt"></i>&nbsp;Внутр. 110<br>
 <i class="fas fa-envelope"></i>&nbsp;<a href="mailto:lushnikova@peshta.ru">lushnikova@peshta.ru</a> </li>
					</ul>
				</div>
				<div class="col-md-4">
					<ul>
						<li>
						Ирина Федорова<br>
 <i class="fas fa-phone-alt"></i>&nbsp;Внутр. 102<br>
 <i class="fas fa-envelope"></i>&nbsp;<a href="mailto:fedorova@peshta.ru">fedorova@peshta.ru</a> </li>
					</ul>
				</div>
				<div class="col-md-4">
					<ul>
						<li>
						Ирина Дроздова<br>
 <i class="fas fa-phone-alt"></i>&nbsp;Внутр. 105<br>
 <i class="fas fa-envelope"></i>&nbsp;<a href="mailto:fedorova@peshta.ru">drozdova@peshta.ru</a> </li>
					</ul>
				</div>
			</div>
			<div class="row mt-5">
				<p style="width: 100%;font-size: 18px;">
					<b>Менеджер департамента оперативной полиграфии, печатей и штампов</b>
				</p>
				<div class="col-md-12">
					<ul>
						<li>
						Ксения Редькина<br>
 <i class="fas fa-phone-alt"></i>&nbsp;Внутр. 104<br>
 <i class="fas fa-envelope"></i>&nbsp;<a href="mailto:market@peshta.ru">market@peshta.ru</a> </li>
					</ul>
				</div>
			</div>
			<div class="row mt-5">
				<p style="width: 100%;font-size: 18px;">
					<b><i class="fas fa-map-marker-alt"></i>&nbsp;г.Ижевск, ул. Кирова, 113</b>
				</p>
				<div class="col-md-12">
					 <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A2c73301f669902c4496cf742af62ea0b9d991590a5682842dabb8da1c990b996&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
				</div>
			</div>
			<div class="row soc-icons-title align-items-center justify-content-center">
 <br>
				 Мы будем рады увидеть вас в наших соц. сетях!<br>
			</div>
			<div class="row soc-icons-row align-items-center justify-content-center p-4">
 <a href="https://vk.com/peshta_izhevsk"><i class="fab fa-vk"></i></a>&nbsp;&nbsp;<a href="https://www.facebook.com/profile.php?id=100001716988807"><i class="fab fa-facebook"></i></a>&nbsp;&nbsp;<a href="https://www.instagram.com/tipografia_peshta/"><i class="fab fa-instagram"></i></a>
			</div>
		</div>
	</div>
</div>
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