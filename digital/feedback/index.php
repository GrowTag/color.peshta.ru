<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Мы печатаем полиграфию в Ижевске. Оперативная поддержка яркими промо-материалами для роста бизнеса.");
$APPLICATION->SetPageProperty("keywords", "типография, ижевск, визитки, фирменный стиль, заказать визитки, упаковка, печать, штампы, буклеты, полиграфия, нумераторы, полиграфия для бизнеса");
$APPLICATION->SetPageProperty("title", "ПЕШТА - Полиграфическая продукция для бизнеса. Ижевск");
$APPLICATION->SetTitle("Для бизнеса");
$APPLICATION->SetPageProperty('canonical', "https://".$_SERVER['HTTP_HOST'].$APPLICATION->GetCurPage());
?>
    <style>
        footer {
            margin-bottom: 0px !important;
            margin-left 0px !important;
            margin-right: 0px !important;
        }
        h1 {
            font-size: 32px;
        }
        /* style 6 */

        .inputfile-6 + label {
            color: #5B636F;
        }

        .inputfile-6 + label {
            border: 1px solid #DBDDDE;
            background-color: #fff;
            padding: 0;
        }

        .inputfile-6:focus + label,
        .inputfile-6.has-focus + label,
        .inputfile-6 + label:hover {
            border: 1px solid #DBDDDE;
        }

        .inputfile-6 + label span,
        .inputfile-6 + label strong {
            padding: 0.625rem 1.25rem;
            /* 10px 20px */
        }

        .inputfile-6 + label span {
            width: auto;
            min-height: 2em;
            display: inline-block;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            vertical-align: top;
        }

        .inputfile-6 + label strong {
            height: 100%;
            color: #5B636F;
            background-color: #DBDDDE;
            display: inline-block;
        }

        .inputfile-6:focus + label strong,
        .inputfile-6.has-focus + label strong,
        .inputfile-6 + label:hover strong {
            background-color: #e8e8e8;
        }

        .box {
            text-align: left;
            max-width: 574px;
            margin: 5px auto;
        }
        .box label {
            width: 100%;
        }
        @media screen and (max-width: 50em) {
            .inputfile-6 + label strong {
                display: block;
            }
        }
        input, select {
            width: 100%;
            max-width: 574px;
            padding: 0px 16px;
            height: 48px;
            background: #FFFFFF;
            border: 1px solid #DBDDDE;
            border-radius: unset !important;
            align-self: center;
            margin-top: 5px;
            margin-bottom: 5px;
            outline: none;
            display: inline-block;
        }
        .red-button {
            border: none;
            outline: none;
            text-align: center;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            margin-top: 20px;
            padding: 14px 48px;
            background: linear-gradient(180deg, #E40E16 0%, #CD0C13 99.48%);
            color: #ffffff;
            text-transform: uppercase;
            transition: .5s all;
        }
        .red-button:hover {
            padding: 14px 48px;
            background: linear-gradient(180deg, #E40E16 0%, #CD0C13 99.48%);
            box-shadow: 0px 4px 24px rgba(228, 14, 22, 0.5);
            color: #ffffff;
            text-transform: uppercase;
            transition: .5s all;
        }
        .red-button:focus{
            padding: 14px 48px;
            background: linear-gradient(180deg, #E40E16 0%, #CD0C13 99.48%);
            box-shadow: 0px 4px 4px rgba(228, 14, 22, 0.5);
            color: #ffffff;
            text-transform: uppercase;
            transition: .5s all;
        }
        .section {
            padding-top: 0;
        }
        .last-section-result .left {
            padding-top: 70px;
        }
        .last-section-result .right img {
            max-width: 75%;
        }
        .last-section-result .left .left__description {
            margin-bottom: 20px;
        }
        @media (max-width: 768px) {
            .last-section-result .right {
                display: none;
            }
        }
        @media (max-width: 1200px){
            .last-section-result {
                padding-bottom: 120px;
            }
            .last-section-result .right {
                display: none;
            }
            .last-section-result .left {
                flex: 100%;
                max-width: 100%;
                width: 100%;
            }
        }
        @media (max-width: 576px){
            .red-button, .red-button:hover, .red-button:focus {
                font-size: x-small !important;
                padding: 10px 20px !important;
            }
        }
    </style>
    <div class="section last-section-result d-flex">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 left">
                    <?$APPLICATION->IncludeComponent(
                        "growtag:main.feedback",
                        "peshta_feedback",
                        array(
                            "USE_CAPTCHA" => "N",
                            "OK_TEXT" => "Заявка на обратный звонок успешно отправлена. Ожидайте звонка наших менеджеров.",
                            "EMAIL_TO" => "neon@list.ru",
                            "REQUIRED_FIELDS" => array(
                                0 => "NAME",
                            ),
                            "EVENT_MESSAGE_ID" => array(
                                0 => "7",
                            ),
                            "COMPONENT_TEMPLATE" => "peshta_feedback",
                            "USER_CONSENT" => "N",
                            "USER_CONSENT_ID" => "0",
                            "USER_CONSENT_IS_CHECKED" => "Y",
                            "USER_CONSENT_IS_LOADED" => "N"
                        ),
                        false
                    );?>
                </div>
                <div class="col-md-6 col-sm-12 right"><img src="<?=SITE_TEMPLATE_PATH?>/images/digital-feedback-bg.png"></div>
            </div>
        </div>
    </div><br/><br/>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
