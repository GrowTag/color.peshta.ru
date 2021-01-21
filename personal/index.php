<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
global $USER;
$APPLICATION->SetTitle("ПЕШТА - Личный кабинет")
?><div class="personal-section mb-4 pt-2">
    <div class="container">
        <div class="row">
            <div class="personal-section__content col-md-8">
                <?$APPLICATION->IncludeComponent(
                    "growtag:personal.imprint",
                    "peshta_color",
                    array(
                        "SELECT" => array("UF_*"),
                        "DISCOUNT_IBLOCK_ID" => 19,
                    ),
                    false
                );
                ?>
                <h2>Ваши заказы
                    <div>
                        <form action="<?=POST_FORM_ACTION_URI?>" method="GET" id="filter">
                            <select onchange="$('#filter').submit();" name="filter">
                                <option <?if($_GET["filter"]=="ALL" && !isset($_GET["filter"])):?>selected="selected"<?endif;?> value="ALL">Все</option>
                                <option <?if($_GET["filter"]=="M"):?>selected="selected"<?endif;?> value="M">В этом месяце</option>
                                <option <?if($_GET["filter"]=="Y"):?>selected="selected"<?endif;?> value="Y">В этом году</option>
                            </select>
                        </form>
                    </div>
                </h2>
                <br>
                <div class="personal-section__content-orders">
                    <?$APPLICATION->IncludeComponent(
                        "growtag:sale.personal.order.list",
                        "peshta_order",
                        array(

                        ),
                        false
                    );
                    ?>
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
