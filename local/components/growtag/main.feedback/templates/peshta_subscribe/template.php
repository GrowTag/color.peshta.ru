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
    <div class="modal fade" id="modalSubscribeOk" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Спасибо за подписку!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-content-body d-flex justify-content-center align-items-center mt-4 mb-4">
                    Проверьте вашу почту - там вас ждет подарок от типографии Пешта
                </div>
                <div class="d-flex ml-3 mr-3 mb-3">
                    <a href="/catalog/" class="red-button form-button">Перейти в каталог</a>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#modalSubscribeOk').modal('show');
        });
    </script>
    <?
}
?>
<section class="subscribe-section">
    <div class="row align-items-center">
        <div class="subscribe-section__title col-md-6">
            Полезная рассылка от Пешты. Подпишитесь прямо сейчас и получите календарь скидок Пешты на 2021 год
        </div>
        <div class="subscribe-section__inputs col-md-6 align-items-center">
            <form action="<?=POST_FORM_ACTION_URI?>" method="POST">
                <?=bitrix_sessid_post()?>
                <input type="text" required placeholder="Ваше имя *" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>"/>
                <input type="text" required placeholder="Ваш Email *" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>">
                <input type="hidden" name="recaptcha_response">
                <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
                <input type="hidden" name="SUBSCRIBE" value="true">
                <input title="Нажимая 'Получить календарь скидок' вы соглашаетесь с политикой конфиденциальности." <?if(strlen($arResult["OK_MESSAGE"]) > 0 || isset($_GET['success'])):?>disabled<?endif;?> type="submit" name="submit" value="Получить календарь скидок" class="red-button form-button">
            </form>
            <div class="form-subscribe-privacy">
                Нажимая 'Получить календарь скидок' вы соглашаетесь с <a href="/privacy/">политикой конфиденциальности</a>
            </div>
        </div>
    </div>
</section>
