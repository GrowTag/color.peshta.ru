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
<form action="<?=POST_FORM_ACTION_URI?>" method="GET" class="filter-form">
    <?=bitrix_sessid_post()?>
    <div class="select">
        <input class="select__input" type="hidden" name="arrFilter" <?if(isset($_REQUEST["arrFilter"])):?>value="<?=$_REQUEST["arrFilter"];?>"<?endif;?>>
        <div class="select__head">Выберите</div>
        <ul class="select__list" style="display: none;">
            <li class="select__item" data-val="ALL">Все</li>
            <li class="select__item" data-val="MONTH">За последний месяц</li>
            <li class="select__item" data-val="YEAR">За последний год</li>
        </ul>
    </div>
    <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
</form>
<script>
    jQuery(($) => {
        <?if(isset($_REQUEST["arrFilter"])):?>
            $('.select__item').each(function() {
                if($(this).data('val') == '<?=$_REQUEST["arrFilter"];?>'){
                    $('.select__head').text($(this).text());
                }
            });
        <?endif;?>

        $('.select').on('click', '.select__head', function () {
            if ($(this).hasClass('open')) {
                $(this).removeClass('open');
                $(this).next().fadeOut();
            } else {
                $('.select__head').removeClass('open');
                $('.select__list').fadeOut();
                $(this).addClass('open');
                $(this).next().fadeIn();
            }
        });

        $('.select').on('click', '.select__item', function () {
            $('.select__head').removeClass('open');
            $(this).parent().fadeOut();
            $(this).parent().prev().text($(this).text());
            $(this).parent().prev().prev().val($(this).data('val'));
            $('.filter-form').submit();
        });

        $(document).click(function (e) {
            if (!$(e.target).closest('.select').length) {
                $('.select__head').removeClass('open');
                $('.select__list').fadeOut();
            }
        });
    });
</script>
