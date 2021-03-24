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
<?if(strlen($arResult["OK_MESSAGE"]) <= 0 && !isset($arResult["OK_MESSAGE"])):?>
    <h2 class="left__title">
        Оставьте заявку
    </h2>
    <div class="left__description">
        Менеджер свяжется с Вами в течение 30 минут
    </div>
<noindex>
<form enctype="multipart/form-data" action="<?=POST_FORM_ACTION_URI?>" method="POST" class="consultation-form">
    <?=bitrix_sessid_post()?>
    <div class="feedback-form__content">
        <input required placeholder="<?=GetMessage("MFT_NAME")?>" type="text" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>"/>
        <input required placeholder="<?=GetMessage("MFT_EMAIL")?>" type="text" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>"/>
        <input required placeholder="<?=GetMessage("MFT_PHONE")?>" type="text" name="user_phone" value="<?=$arResult["AUTHOR_PHONE"]?>"/>
        <select name="user_vol">
            <option disabled selected>Выберите тираж</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="Больше 100">Больше 100</option>
        </select>
        <div class="box">
            <input type="file" name="user_select[]" id="user_select" class="inputfile inputfile-6" hidden>
            <label for="user_select">
                <strong style="font-weight: 400">
                    Прикрепить макет
                </strong>
                <span></span>
            </label>
        </div>
        <input type="hidden" name="recaptcha_response">
        <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
    </div>
    <input title="Нажимая 'Отправить' вы соглашаетесь с политикой конфиденциальности и даёте согласие на периодическую коммуникацию." <?if(strlen($arResult["OK_MESSAGE"]) > 0 || isset($_GET['success'])):?>disabled<?endif;?> type="submit" class="red-button" name="submit" value="Получить предложение"/>
</form>
</noindex>
<script>
    ;(function (document, window, index){
        'use strict';
        var inputs = document.querySelectorAll('.inputfile');
        Array.prototype.forEach.call(inputs, function (input) {
            var label = input.nextElementSibling,
                labelVal = label.innerHTML;

            input.addEventListener('change', function (e) {
                var fileName = '';
                if (this.files && this.files.length > 1)
                    fileName = ( this.getAttribute('data-multiple-caption') || '' ).replace('{count}', this.files.length);
                else
                    fileName = e.target.value.split('\\').pop();

                if (fileName)
                    label.querySelector('span').innerHTML = fileName;
                else
                    label.innerHTML = labelVal;
            });

            // Firefox bug fix
            input.addEventListener('focus', function () {
                input.classList.add('has-focus');
            });
            input.addEventListener('blur', function () {
                input.classList.remove('has-focus');
            });
        });
    }(document, window, 0));
</script>
<?else:?>
    <h2 class="left__title" style="margin-top: 120px;">
        Спасибо за Вашу заявку!
    </h2>
    <div class="left__description">
        Менеджер свяжется с Вами в течение 30 минут
    </div>
<?endif;?>
