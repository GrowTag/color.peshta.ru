<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Выйдите на новый уровень скорости печати и результативности продаж, маркетинга и рекламы с цифровыми технологиями «Пешта Digital®»");
$APPLICATION->SetPageProperty("keywords", "типография, ижевск, визитки, фирменный стиль, заказать визитки, упаковка, печать, штампы, буклеты, полиграфия, нумераторы, полиграфия для бизнеса");
$APPLICATION->SetPageProperty("title", "ПЕШТА - Срочная печать и персонализация маркетинговых материалов в Ижевске");
$APPLICATION->SetTitle("Цифровая печать");
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

    .first-digital-section {
        background: url(/local/templates/peshta_growtag/images/first-digital-section.png) center no-repeat, linear-gradient(90deg,#c2c2c4, #bbbabd);
    }
    .first-digital-section .title-wrap {
        margin-top: 40px;
        margin-bottom: 40px;
        padding:40px;
        background: #ffffff;
        text-align: left;
    }
    .first-digital-section .title-wrap .p-description {
        font-size: 18px;
        line-height: 24px;
        color: #5B636F;
    }
    .first-digital-section .title-wrap .span-title {
        font-size: 20px;
        line-height: 24px;
        letter-spacing: 0.02em;
        color: #185DC5;
    }
    .first-digital-section .title-wrap .orange-wrap {
        flex-direction: row;
        padding: 20px 15px;
        position: absolute;
        width: 270px;
        left: 90%;
        top: 65%;
        background: #FF6E3A;
        font-size: 12px;
        line-height: 20px;
        display: flex;
        align-items: center;
        text-align: center;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        color: #FFFFFF;
        font-weight: 700;
    }
    .second-digital-section {
        padding: 40px;
        background: url(/local/templates/peshta_growtag/images/main-digital-section-bg.png) repeat-y;
        background-size: cover;
        background-color: #f3f3f3;
        background-position-y: 50px;
    }
    .digital-last-section {
        padding: 40px;
        background-color: #f3f3f3;
    }
    .second-digital-section .content {
        background: #FFFFFF;
        box-shadow: 0px 4px 26px #DBDDDE;
        padding: 40px;
        max-width: 1200px;
        display: flex;
    }
    .second-digital-section .content img {
        width: 100%;
    }
    .second-digital-section .content .nav, .digital-last-section .nav {
        position: unset;
        width: 100%;
        background: none;
    }
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        font-weight: 600;
        font-size: 24px;
        line-height: 28px;
        display: flex;
        align-items: center;
        letter-spacing: 0.02em;
        color: #E40E16;
        background-color: unset;
        border-color: unset;
        border: unset;
        text-decoration: underline;
    }
    .nav-tabs .nav-link {
        font-weight: 600;
        font-size: 24px;
        line-height: 28px;
        display: flex;
        align-items: center;
        letter-spacing: 0.02em;
        color: #000000;
        background-color: unset;
        border-color: unset;
        border: unset;
    }
    .nav-tabs {
        border-bottom: 0px;
    }
    .tab-content {
        text-align: left;
        padding-left: 30px !important;
    }
    .tab-content .why-speed {
        font-weight: 500;
        font-size: 22px;
        line-height: 28px;
        color: #ffffff;
        padding: 8px 16px;
        background: #185DC5;
    }
    .tab-content .tab-content-list {

    }
    .tab-content .tab-content-list div ul {
        margin-top: 15px;
        list-style: none;
    }
    .tab-content .tab-content-list div ul li {
        color: #5B636F;
        line-height: 25px;
    }
    .tab-content .tab-content-list div ul li::before {
        content: "\2022";  /* Add content: \2022 is the CSS Code/unicode for a bullet */
        color: #185DC5; /* Change the color */
        font-weight: bold; /* If you want it to be bold */
        display: inline-block; /* Needed to add space between the bullet and the text */
        width: 1em; /* Also needed for space (tweak if needed) */
        margin-left: -1em; /* Also needed for space (tweak if needed) */
    }
    .tab-content .tab-content-list div {
        padding-left: 30px;
        font-size: 16px;
        line-height: 20px;
        margin-bottom: 15px;
        padding-top: 3px;
    }
    .tab-content .tab-content-list div:nth-child(1){
        background: url(/local/templates/peshta_growtag/images/li1.png) top left no-repeat;
    }
    .tab-content .tab-content-list div:nth-child(2){
        background: url(/local/templates/peshta_growtag/images/li2.png) top left no-repeat;
    }
    .tab-content .tab-content-list div:nth-child(3){
        background: url(/local/templates/peshta_growtag/images/li3.png) top left no-repeat;
    }
    .tab-content .tab-content-list div:nth-child(4){
        background: url(/local/templates/peshta_growtag/images/li4.png) top left no-repeat;
    }
    .tab-content p {
        font-size: 22px;
        line-height: 30px;
        color: #5B636F;
    }
    .digital-last-section {
        padding-bottom: 70px;
    }
    .digital-last-section h2 {
        text-align: left;
        font-size: 36px;
        line-height: 40px;
        color: #000000;
        padding-left: 40px;
    }
    a.red-button {
        text-decoration: none;
        font-weight: 600;
        display: inline-block;
        margin-top: 20px;
        padding: 16px 48px;
        background: linear-gradient(180deg, #E40E16 0%, #CD0C13 99.48%);
        color: #ffffff;
        text-transform: uppercase;
        transition: .5s all;
    }
    a.red-button:hover {
        padding: 16px 48px;
        background: linear-gradient(180deg, #E40E16 0%, #CD0C13 99.48%);
        box-shadow: 0px 4px 24px rgba(228, 14, 22, 0.5);
        color: #ffffff;
        text-transform: uppercase;
        transition: .5s all;
    }
    a.red-button:focus{
        padding: 16px 48px;
        background: linear-gradient(180deg, #E40E16 0%, #CD0C13 99.48%);
        box-shadow: 0px 4px 4px rgba(228, 14, 22, 0.5);
        color: #ffffff;
        text-transform: uppercase;
        transition: .5s all;

    }
    .question-wrap {
        background: url(/local/templates/peshta_growtag/images/krugi.png) top left no-repeat;
        padding-top: 5em;
        padding-left: 5em;
    }
    .question {
        background: #185DC5;
        border-radius: 32px;
        padding:3em;
        text-align: left;
    }
    .question::after {
        content: "";
        color: #185DC5;
        display: block;
        width: 133px;
        position: absolute;
        right: -30px;
        bottom: 0px;
        height: 133px;
        background: url(/local/templates/peshta_growtag/images/strelka.png) center no-repeat;
        background-size: contain;
    }
    .question .question__title {
        font-size: 24px;
        line-height: 32px;
        color: #FFFFFF;
        font-weight: 600;
    }
    .question .question__description {
        font-size: 20px;
        line-height: 24px;
        letter-spacing: 0.02em;
        color: #FFFFFF;
    }
    @media (max-width: 1244px) {
        .first-digital-section .title-wrap {
            max-width: 100%;
        }
        .first-digital-section .title-wrap .orange-wrap {
            position: unset;
            margin-top: 20px;
        }

    }
    @media (max-width: 1200px){
        .second-section-content-img {
            display: none;
        }
        .second-section-content-text {
            max-width: 100%;
            flex: 100%;
            padding: 0;
        }
        .second-digital-section .content {
            padding: 0;
        }
    }
    @media (max-width: 1000px){
        .question-wrap {
            background: url(/local/templates/peshta_growtag/images/krugi.png) top left no-repeat;
            padding-top: 4em;
            padding-left: 0em;
        }
    }
    @media (max-width: 768px){
        .question {
            background: #185DC5;
            border-radius: 32px;
            padding: 2em;
            text-align: left;
        }
        .second-digital-section .content .nav, .digital-last-section .nav {
            position: initial;
            width: unset;
            max-width: unset;
            min-width: unset;
        }
        .nav-tabs {
            border-bottom: 0px;
            padding-left: 0;
            padding-right: 0;
            display: flex;
            justify-content: center;
        }
        .digital-last-section .nav-link {
            font-size: 20px !important;
        }
        .container-fluid {
            padding: 0;
        }
        .digital-last-section {
            padding: 10px;
            padding-bottom: 40px;
        }
        .digital-last-section .tab-content {
            text-align: center !important;
        }
        .digital-last-section h2 {
            text-align: center;
            font-size: 36px !important;
            line-height: 40px;
            color: #000000;
            padding-left: 0;
        }
        a.red-button {
            text-decoration: none;
            text-align: center;
            font-weight: 600;
            display: inline-block;
            margin-top: 20px;
            padding: 15px 30px;
            background: linear-gradient(180deg, #E40E16 0%, #CD0C13 99.48%);
            color: #ffffff;
            text-transform: uppercase;
            transition: .5s all;
        }

        .question-wrap {
            padding-right: 0;
            margin-bottom: 60px;
        }
        .question::after {
            transform: matrix(-0.71, 0.71, 0.71, 0.71, 0, 0);
            bottom: -80px;
            right: 20px;
        }
        .first-digital-section {
            padding-left: 0;
            padding-right: 0;
            background: url(/local/templates/peshta_growtag/images/first-digital-section.png) top no-repeat;
            background-size: contain;
            padding-top: 40px;
        }
        .first-digital-section .title-wrap {
            padding: 20px !important;
        }
        .second-digital-section, .second-digital-section .container {
            padding-left:0;
            padding-right:0;
        }
        .orange-wrap {
            width: 100% !important;
        }
        .why-speed {
            font-size: 16px !important;
            display: block;
            width: 100%;
            text-align: center;
        }
        .tab-content {
            text-align: left;
            padding: 10px !important;
        }
        .second-section-content-text .tab-content>.tab-pane {
            display: block;
            margin-bottom: 40px;
        }
        .second-section-content-text .fade:not(.show) {
            opacity: 1;
        }
        .second-section-content-text li.nav-item {
            display: none;
        }
    }
    @media (max-width: 576px){
        .section {
            padding-top: 40px;
        }
    }
</style>
<div class="section first-digital-section d-flex">
    <div class="container">
        <div class="title-wrap col-md-6 col-sm-12">
            <span class="span-title">цифровая печать</span>
            <h1 class="title mt-4 mb-3">Срочная печать и персонализация маркетинговых материалов</h1>
            <p class="p-description m-0">Выйдите на новый уровень скорости печати и результативности продаж, маркетинга и рекламы с цифровыми технологиями «Пешта Digital®»</p>
            <div class="orange-wrap">
                Получайте от маркетинговых материалов больше отдачи!
            </div>
        </div>
    </div>
</div>
<div class="section second-digital-section d-flex">
    <div class="container d-flex justify-content-center">
            <div class="content col-md-12">
                <div class="col-md-8 col-sm-12 second-section-content-text">
                    <div class="container-fluid">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#description">Важна скорость</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#characteristics">Важна результативность</a>
                            </li>
                        </ul>
                        <div class="tab-content p-3">
                            <div class="tab-pane fade show active" id="description">
                                <span class="why-speed">Почему важна скорость?</span>
                                <div class="tab-content-list mt-5">
                                    <div>
                                        Ваши клиенты не хотят больше ждать!
                                    </div>
                                    <div>
                                        Ваш маркетинг и продажи должны реагировать на запросы клиентов немедленно и «играть на опережение» против конкурентов!
                                    </div>
                                    <div>
                                        Цифровая печать по требованию позволяет получить:
                                        <ul>
                                            <li>столько копий, сколько нужно</li>
                                            <li>тогда, когда нужно</li>
                                            <li>там, где нужно</li>
                                            <li>с самой новой информацией</li>
                                        </ul>
                                    </div>
                                    <div>
                                        Возврат на инвестиции в печать по требованию выше на 25%, чем при обычном заказе печатной продукции!
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="characteristics">
                                <span class="why-speed">Почему важна результативность?</span>
                                <div class="tab-content-list mt-5">
                                    <div>
                                        Ваши Клиенты хотят индивидуального подхода и особого отношения
                                    </div>
                                    <div>
                                        Персонализированные обращения и индивидуальные предложения повышают коныерсию в продажи на 35%
                                    </div>
                                    <div>
                                        Возврат на инвестиции в персонализированные маркетинговые кампании в среднем на 21% больше!
                                    </div>
                                    <div>
                                        Возврат на инвестиции в персонализированные почтовые рассылки + e-mail в среднем на 39% больше, чем только от e-mail.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 second-section-content-img">
                    <img src="<?=SITE_TEMPLATE_PATH?>/images/second-section-content.png"/>
                </div>
        </div>
    </div>
</div>
<div class="section digital-last-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 question-wrap">
                <div class="question">
                    <div class="question__title mb-2">
                        Скажите нет!
                    </div>
                    <div class="question__description">складам,<br/>большим тиражам,<br/>лишним расходам и проигранным сделкам!
                    </div>
                </div>
            </div>
            <div class="col-md-8 p-0">
                <h2 class="mt-4">Что для вас сейчас важнее?</h2>
                <div class="container-fluid">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#speed">Важна скорость</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#result">Важна результативность</a>
                        </li>
                    </ul>
                    <div class="tab-content p-3">
                        <div class="tab-pane fade show active" id="speed">
                            <p>Нужно оперативно печатать маркетинговые материалы и снижать расходы на печать?</p>
                            <a class="red-button" href="/digital/speed/">получите предложение</a>
                        </div>
                        <div class="tab-pane fade" id="result">
                            <p>Нужно оперативно печатать маркетинговые материалы и снижать расходы на печать?</p>
                            <a class="red-button" href="/digital/result/">получите предложение</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
