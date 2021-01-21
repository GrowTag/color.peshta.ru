<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$APPLICATION->SetPageProperty("description", "Мы печатаем полиграфию в Ижевске. Оперативная поддержка яркими промо-материалами для роста бизнеса.");
$APPLICATION->SetPageProperty("keywords", "типография, ижевск, визитки, фирменный стиль, заказать визитки, упаковка, печать, штампы, буклеты, полиграфия, нумераторы, полиграфия для бизнеса");
$APPLICATION->SetPageProperty("title", "ПЕШТА - Регистрация");
$APPLICATION->SetTitle("Регистрация");
?>

<div class="section-auth d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <h1>Регистрация</h1>
        </div>
        <div class="row justify-content-center align-items-center mt-4">
            <p><?echo $arResult["MESSAGE_TEXT"]?></p>
        </div>
        <div class="row justify-content-center align-items-center bx-auth">
<?//here you can place your own messages
	switch($arResult["MESSAGE_CODE"])
	{
	case "E01":
		?><? //When user not found
		break;
	case "E02":
		?><? //User was successfully authorized after confirmation
		break;
	case "E03":
		?><? //User already confirm his registration
		break;
	case "E04":
		?><? //Missed confirmation code
		break;
	case "E05":
		?><? //Confirmation code provided does not match stored one
		break;
	case "E06":
		?><? //Confirmation was successfull
		break;
	case "E07":
		?><? //Some error occured during confirmation
		break;
	}
?>
<?if($arResult["SHOW_FORM"]):?>
	<form method="post" action="<?echo $arResult["FORM_ACTION"]?>">
		<table class="data-table bx-confirm-table">
			<tr>
				<td>
					<?echo GetMessage("CT_BSAC_LOGIN")?>:&nbsp;
				</td>
				<td>
					<input class="bx-auth-input m-0" type="text" name="<?echo $arParams["LOGIN"]?>" maxlength="50" value="<?echo $arResult["LOGIN"]?>" size="17" />
				</td>
			</tr>
			<tr>
				<td>
					<?echo GetMessage("CT_BSAC_CONFIRM_CODE")?>:&nbsp;
				</td>
				<td>
					<input class="bx-auth-input m-0" type="text" name="<?echo $arParams["CONFIRM_CODE"]?>" maxlength="50" value="<?echo $arResult["CONFIRM_CODE"]?>" size="17" />
				</td>
			</tr>
		</table>
        <input class="auth-section-button__orange mt-4" type="submit" value="<?echo GetMessage("CT_BSAC_CONFIRM")?>" />
		<input type="hidden" name="<?echo $arParams["USER_ID"]?>" value="<?echo $arResult["USER_ID"]?>" />
	</form>
<?elseif(!$USER->IsAuthorized()):?>
	<?$APPLICATION->IncludeComponent("bitrix:system.auth.authorize", "", array());?>
<?endif?>
        </div>
    </div>
</div>
