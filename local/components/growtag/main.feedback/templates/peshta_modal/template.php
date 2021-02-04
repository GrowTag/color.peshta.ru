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
            toastr.error('Что-то пошло не так... Попробуйте еще раз!', 'УПС!...');
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
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Обратный звонок</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=POST_FORM_ACTION_URI?>" method="POST" class="consultation-form">
                <?=bitrix_sessid_post()?>
            <div class="modal-body">
                <input required placeholder="<?=GetMessage("MFT_NAME")?>" type="text" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>"/>
                <input required placeholder="<?=GetMessage("MFT_EMAIL")?>" type="text" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>"/>
                <input required placeholder="<?=GetMessage("MFT_PHONE")?>" type="text" name="user_phone" value="<?=$arResult["AUTHOR_PHONE"]?>"/>
                <p>Зарегистрируйтесь на сайте для оформления заказа онлайн.<br/>Вы можете авторизоваться на сайте через соц.сети!<br/>Нажимая "Заказать" вы соглашаетесь с <a href="/policy/">политикой конфиденциальности</a>.</p>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="recaptcha_response">
                <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
                <a href="/personal/" class="modal-button-grey">Регистрация / Вход</a>
                <input title="Нажимая 'Заказать' вы соглашаетесь с политикой конфиденциальности." <?if(strlen($arResult["OK_MESSAGE"]) > 0 || isset($_GET['success'])):?>disabled<?endif;?> type="submit" name="submit" value="Заказать" class="modal-button-orange"/>
            </div>
            </form>
        </div>
    </div>
</div>
