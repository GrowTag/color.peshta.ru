<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<?if(!empty($arResult["ERROR_MESSAGE"]))
{?>
    <script type="text/javascript">
        $(document).ready(function() {
            toastr.error('<?
                foreach($arResult["ERROR_MESSAGE"] as $res){
                    print $res."\n\r";
                }
                ?>', 'УПС!...');
        });
    </script>
<?}
if(strlen($arResult["OK_MESSAGE"]) > 0)
{
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            toastr.success('<?=$arResult["OK_MESSAGE"]?>', 'Успешно!');
        });
    </script>
    <?
}
?>
<noindex>
<form action="<?=POST_FORM_ACTION_URI?>" method="POST" class="consultation-form">
    <?=bitrix_sessid_post()?>
    <div class="section__content">
    <div class="feedback-card row">
        <div class="col-md-7 col-sm-12">
            <input required placeholder="<?=GetMessage("MFT_NAME")?>" type="text" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>"/>
            <label for="user_email">Email <input required placeholder="<?=GetMessage("MFT_EMAIL")?>" type="text" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>"/></label>
            <label for="user_phone">Тел. <input required placeholder="<?=GetMessage("MFT_PHONE")?>" type="text" name="user_phone" value="<?=$arResult["AUTHOR_PHONE"]?>"/></label>
        </div>
    </div>
    <input type="hidden" name="recaptcha_response">
    <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
    </div>
    <input title="Нажимая 'Отправить' вы соглашаетесь с политикой конфиденциальности." <?if(strlen($arResult["OK_MESSAGE"]) > 0 || isset($_GET['success'])):?>disabled<?endif;?> type="submit" class="section__button feedback-card__button btn" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>"/>
</form>
</noindex>
