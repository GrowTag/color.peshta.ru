<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Ваши клиенты не хотят ждать, а вашим сотрудникам всегда нужны свежие инструменты продаж под рукой!");
$APPLICATION->SetPageProperty("keywords", "типография, ижевск, визитки, фирменный стиль, заказать визитки, упаковка, печать, штампы, буклеты, полиграфия, нумераторы, полиграфия для бизнеса");
$APPLICATION->SetPageProperty("title", "ПЕШТА - Срочная цифровая печать ваших маркетинговых материалов в Ижевске");
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
    a.red-button {
        text-align: center;
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
    .first-digital-section-speed {
        background: url(/local/templates/peshta_growtag/images/first-digital-speed-section.png) center no-repeat, linear-gradient(90deg,#c2c2c4, #bbbabd);
        background-size: cover;
    }
    .first-digital-section-speed .title-wrap {
        margin-top: 40px;
        margin-bottom: 40px;
        padding:40px;
        background: #ffffff;
        text-align: left;
    }
    .first-digital-section-speed .title-wrap .span-red {
        font-weight: bold;
        font-size: 20px;
        line-height: 24px;
        align-items: center;
        letter-spacing: 0.02em;
        color: #E40E16;
        margin-bottom: 10px;
        display: inline-block;
    }
    .first-digital-section-speed .title-wrap .p-description {
        font-size: 18px;
        line-height: 24px;
        color: #5B636F;
    }
    .first-digital-section-speed .title-wrap .span-title {
        font-size: 20px;
        line-height: 24px;
        letter-spacing: 0.02em;
        color: #185DC5;
    }
    .first-digital-section-speed .title-wrap .orange-wrap {
        text-align: center;
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
        letter-spacing: 0.04em;
        text-transform: uppercase;
        color: #FFFFFF;
        font-weight: 700;
    }
    .first-digital-section-speed ul {
        margin-top: 15px;
        list-style: none;
    }
    .first-digital-section-speed ul li {
        color: #5B636F;
        line-height: 25px;
    }
    .first-digital-section-speed ul li::before {
        content: "\2022";  /* Add content: \2022 is the CSS Code/unicode for a bullet */
        color: #185DC5; /* Change the color */
        font-weight: bold; /* If you want it to be bold */
        display: inline-block; /* Needed to add space between the bullet and the text */
        width: 1em; /* Also needed for space (tweak if needed) */
        margin-left: -1em; /* Also needed for space (tweak if needed) */
    }
    .first-digital-section-speed .span-black {
        font-weight: bold;
        font-size: 16px;
        line-height: 20px;
        letter-spacing: 0.02em;
        color: #363636;
        margin-left: 22px;
    }
    .second-digital-section {
        padding: 60px;
        background: url(/local/templates/peshta_growtag/images/main-digital-section-bg.png) repeat-y;
        background-size: cover;
        background-color: #f3f3f3;
        background-position-y: 500px;
    }
    .second-digital-section .right {
        text-align: left;
    }
    .question-wrap {
        background: url(/local/templates/peshta_growtag/images/krugi.png) top left no-repeat;
        padding-top: 0;
        padding-left: 3em;
        padding-bottom: 5em;
        padding-right: 3em;
        background-position-y: 110px;
    }
    .question {
        background: #185DC5;
        border-radius: 32px;
        padding:2em;
        text-align: left;
    }
    .question::after {
        content: "";
        color: #185DC5;
        display: block;
        width: 133px;
        position: absolute;
        right: 5px;
        top: 0;
        height: 133px;
        background: url(/local/templates/peshta_growtag/images/strelka.png) center no-repeat;
        background-size: contain;
        transform: rotate(152deg);
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
    .question-list-item:nth-child(1) {
        background: url(/local/templates/peshta_growtag/images/q-list1.png) top left no-repeat;
    }
    .question-list-item:nth-child(2) {
        background: url(/local/templates/peshta_growtag/images/q-list2.png) top left no-repeat;
    }
    .question-list-item:nth-child(3) {
        background: url(/local/templates/peshta_growtag/images/q-list3.png) top left no-repeat;
    }
    .question-list-item {
        margin-top: 20px;
        padding-left: 90px;
    }
    .question-list-item__title {
        font-weight: bold;
        font-size: 20px;
        line-height: 24px;
        align-items: center;
        color: #363636;
        padding-top: 8px;
        margin-bottom: 20px;
    }
    .question-list-item__description {
        font-size: 14px;
        line-height: 20px;
        align-items: center;
        color: #5B636F;
    }
    .section-personal-result {
        text-align: left;
        padding-bottom: 80px;
    }
    .section-personal-result .left {
        padding-left: 0;
        padding-right: 40px;
        padding-top: 40px;
        padding-bottom: 40px;
        display: flex;
    }
    .section-personal-result .left img {
        width: 100%;
    }
    .section-personal-result .right {

    }
    .section-personal-result .right .list {

    }
    .list-item {
        background: url(/local/templates/peshta_growtag/images/speed-list.png) top left no-repeat;
        background-size: 10%;
    }
    .list-item {
        margin-top: 20px;
        padding-left: 90px;
    }
    .list-item__title {
        font-weight: bold;
        font-size: 20px;
        line-height: 24px;
        align-items: center;
        color: #363636;
        margin-bottom: 20px;
    }
    .list-item__description {
        font-size: 14px;
        line-height: 20px;
        align-items: center;
        color: #5B636F;
    }
    .section-personal-result .right h2 {
        margin-bottom: 40px;
    }
    .last-section-speed {
        background: #f3f3f3;
        padding: 0;
    }
    .last-section-speed .left {
        padding: 70px 20px 70px 60px;
        text-align: left;
    }
    .last-section-speed .right img{
        height: 100%;
    }
    .last-section-speed h2 {
        line-height: 40px;
    }
    .last-section-speed h2 span {
        line-height: 40px;
        align-items: center;
        color: #185DC5;
        display: flex;
        margin-bottom: 10px;
    }

    .step:nth-child(1) {
        background: url(/local/templates/peshta_growtag/images/1step.png) top center no-repeat;
    }
    .step:nth-child(2) {
        background: url(/local/templates/peshta_growtag/images/strelka.png) top center no-repeat;
        transform: rotateX(180deg);
    }
    .step:nth-child(3) {
        background: url(/local/templates/peshta_growtag/images/2step.png) top center no-repeat;
    }
    .step:nth-child(4) {
        background: url(/local/templates/peshta_growtag/images/strelka.png) top center no-repeat;
    }
    .step:nth-child(5) {
        background: url(/local/templates/peshta_growtag/images/3step.png) top center no-repeat;
    }
    .step:nth-child(6) {
        background: url(/local/templates/peshta_growtag/images/strelka.png) top center no-repeat;
        transform: rotateX(180deg);
    }
    .step:nth-child(7) {
        background: url(/local/templates/peshta_growtag/images/4step.png) top center no-repeat;
    }
    .step:nth-child(8) {
        background: url(/local/templates/peshta_growtag/images/strelka.png) top center no-repeat;
    }
    .step:nth-child(9) {
        background: url(/local/templates/peshta_growtag/images/5step.png) top center no-repeat;
    }
    .step {
        padding-top: 60px;
        margin-top: 20px;
        font-size: 15px;
        line-height: 20px;
        display: block !important;
        text-align: center !important;
        color: #000000;
        font-weight: 600;
    }
    .steps {
        margin-top: 40px;
        padding-bottom: 70px;
    }
    .section-steps-speed {
        background: #f3f3f3;
    }
    .section-why-speed {
        padding-bottom: 60px;
        background: url(/local/templates/peshta_growtag/images/why-speed-bg.png) top center no-repeat;
        background-size: cover;
    }
    .section-why-speed .left {
        padding-left: 8%;
        text-align: left;
    }
    .section-why-speed .left {

    }
    .section-why-speed .right img {
        max-height: 400px;
    }
    .section-why-speed ul {
        margin-top: 15px;
        list-style: none;
    }
    .section-why-speed ul li {
        color: #5B636F;
        line-height: 25px;
    }
    .section-why-speed ul li::before {
        content: "\2022";  /* Add content: \2022 is the CSS Code/unicode for a bullet */
        color: #185DC5; /* Change the color */
        font-weight: bold; /* If you want it to be bold */
        display: inline-block; /* Needed to add space between the bullet and the text */
        width: 1em; /* Also needed for space (tweak if needed) */
        margin-left: -1em; /* Also needed for space (tweak if needed) */
    }
    @media (min-width: 1920px) {
        .question::after {
            top: 7px;
        }
    }
    @media (max-width: 1300px){
        .step:nth-child(2), .step:nth-child(8), .step:nth-child(4), .step:nth-child(6), .step:nth-child(8) {
            display: none !important;
        }
        .question-wrap {
            padding-left: 0;
        }
        .question::after {
            display: none;
        }
        .question .question__description {
            font-size: 16px;
        }
        .question .question__title {
            font-size: 18px;
        }
    }
    @media (max-width: 1200px){
        .section-personal-result {
            padding-left: 0;
            padding-right: 0;
        }
        .section-personal-result .left {
            width: 100%;
            max-width: 100%;
            flex: 100%;
            padding-left: 0;
            padding-right: 0;
        }
        .section-personal-result .right {
            width: 100%;
            max-width: 100%;
            flex: 100%;
        }
    }
    @media (max-width: 1000px){
        .question-wrap {
            background-position-y: 10px;
            padding-bottom: 150px;
        }
        .second-digital-section {
            background-image: none;
        }
        .second-digital-section .left {
            width: 100%;
            max-width: 100%;
            flex: 100%;
            padding-left: 0;
            padding-right: 0;
        }
        .second-digital-section .right {
            width: 100%;
            max-width: 100%;
            flex: 100%;
            padding-left: 0;
            padding-right: 0;
        }
        .first-digital-section-speed {
            padding-left: 0;
            padding-right: 0;
            background: url(/local/templates/peshta_growtag/images/first-digital-speed-section.png) top no-repeat;
            background-size: contain;
            padding-top: 40px;
        }
        .first-digital-section-speed .title-wrap {
            width: 100% !important;
            flex: 100%;
            padding: 20px !important;
            max-width: 100%;
        }
        .first-digital-section-speed .orange-wrap {
            flex-direction: row;
            margin-top: 30px;
            padding: 20px 15px;
            position: unset !important;
            width: 100% !important;
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
            padding-left: 10px;
            padding-right: 10px;
        }
    }
    @media (max-width: 768px){
        .step {
            width: 100%;
            max-width: 100%;
            flex: 100%;
            font-size: 16px;
        }
        .question-list-item__title {
            font-weight: bold;
            font-size: 16px;
        }
        .list-item__title {
            font-weight: bold;
            font-size: 16px;
        }
        a.red-button {
            text-align: center !important;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            margin-top: 20px;
            padding: 15px 30px;
            background: linear-gradient(180deg, #E40E16 0%, #CD0C13 99.48%);
            color: #ffffff;
            text-transform: uppercase;
            transition: .5s all;
        }
        .last-section-speed {
            padding-bottom: 40px;
        }
        .last-section-speed .right {
            padding: 0 0 20px 0;
            order: 1;
        }
        .last-section-speed .left {
            padding: 10px 10px 10px 10px;
            text-align: left;
            order: 2;
        }
        .section-why-speed, .section-why-speed .container, .section-why-speed .container .right {
            padding-right: 0;
            padding-left: 0;
        }
        .section-why-speed {
            padding-bottom: 0;
        }
        .section-personal-result {
            padding-top: 0;
        }
        .section-personal-result .container .left {
            padding-top: 0 !important;
        }
        .section-personal-result, .section-personal-result .container, .section-personal-result .container .left {
            padding-right: 0;
            padding-left: 0;
        }

    }
    @media (max-width: 520px){
        a.red-button {
            font-size: 14px;
        }
        .list-item {
            background-size: 14%;
            padding-left: 17%;
        }
    }
    @media (max-width: 576px){
        .section {
            padding-top: 40px;
        }
        .last-section-speed {
            padding-top: 0 !important;
        }
        .section-personal-result {
            padding-top: 0;
        }
        .section-personal-result .container .left {
            padding-top: 0 !important;
        }
        .section-why-speed {
            padding-bottom: 0;
        }
    }

</style>
<div class="section first-digital-section-speed d-flex">
    <div class="container">
        <div class="title-wrap col-md-6 col-sm-12">
            <h1 class="title mt-4 mb-3">Срочная цифровая печать ваших маркетинговых материалов</h1>
            <span class="span-red">«По первому требованию» от 60 минут</span>
            <p class="p-description m-0">Ваши клиенты не хотят ждать, а вашим сотрудникам всегда нужны свежие инструменты продаж под рукой!</p>
            <br/>
            <span class="span-title">Маркетинговые материалы:</span>
            <br/>
            <ul>
                <li>Каталоги</li>
                <li>Брошюры</li>
                <li>Раздаточные материалы</li>
                <li>Коммерческие предложения</li>
            </ul>
            <span class="span-black">+ Персонализация буклетов и предложений</span>
            <br/><br/>
            <span class="span-title">Инструменты продаж:</span>
            <ul>
                <li>Презентации</li>
                <li>Буклеты о продуктах и услугах </li>
            </ul>
            <span class="span-black">+ Скорость</span>
            <div class="orange-wrap">
                Получайте от маркетинговых материалов больше отдачи!
            </div>
        </div>
    </div>
</div>
<div class="section section-steps-speed d-flex">
    <div class="container">
        <h2>Разместить и получить заказ с «Пешта Digital®» всегда просто!</h2>
        <div class="row steps">
            <div class="col step d-flex">Заполните форму</div>
            <div class="col step d-flex"></div>
            <div class="col step d-flex">Прикрепите файл</div>
            <div class="col step d-flex"></div>
            <div class="col step d-flex">Получите подтверждение заказа</div>
            <div class="col step d-flex"></div>
            <div class="col step d-flex">Сделайте оплату, пока идет печать</div>
            <div class="col step d-flex"></div>
            <div class="col step d-flex">Получите заказ!</div>
        </div>
    </div>
</div>
<div class="section section-why-speed d-flex">
    <div class="container">
        <div class="row">
            <div class="col-md-6 left">
                <h2>Почему цифровая печать «по первому требованию» так выгодна?</h2>
                <ul>
                    <li>столько копий, сколько нужно</li>
                    <li>тогда, когда нужно</li>
                    <li>там, где нужно</li>
                    <li>с самой актуальной информацией о ваших продуктах и услугах</li>
                    <li>без лишних затрат</li>
                </ul>
            </div>
            <div class="col-md-6 right">
                <img src="<?=SITE_TEMPLATE_PATH?>/images/why-speed-img.png"/>
            </div>
        </div>
    </div>
</div>
<div class="section second-digital-section d-flex">
    <div class="container">
        <div class="row">
            <div class="col-md-4 left question-wrap">
                <div class="question">
                    <div class="question__title mb-2 mt-2">
                        Всем нужно
                    </div>
                    <div class="question__description">
                        эффективно использовать каждый рубль, инвестированный в печатные материалы
                    </div>
                </div>
            </div>
            <div class="col-md-8 right">
                <h2>Почему так часто возникает необходимость в срочной цифровой печати по первому требованию?</h2><br/>
                <div class="question-list">
                    <div class="question-list-item">
                        <div class="question-list-item__title">
                            Ваши Клиенты не хотят ждать!
                        </div>
                        <div class="question-list-item__description">
                            По статистике, неактуальная информация в маркетинговых материалах и каждые 4 часа ожидания со стороны клиента снижают вероятность сделки до 2-х раз! Клиенты не хотят ждать больше 15 минут при заказе онлайн и больше 2-3-х часов при заказе оффлайн.
                        </div>
                    </div>
                    <div class="question-list-item">
                        <div class="question-list-item__title">
                            Ваши клиенты каждый раз хотят чего-то нового
                        </div>
                        <div class="question-list-item__description">
                            Вам нужно постоянно обновлять версии маркетинговых материалов и инструментов продаж, чтобы привлечь внимание своих клиентов и помочь принять решение в вашу пользу.
                        </div>
                    </div>
                    <div class="question-list-item">
                        <div class="question-list-item__title">
                            Сотрудникам нужны актуальные инструменты продаж под рукой
                        </div>
                        <div class="question-list-item__description">
                            Ваш маркетинг и продажи должны реагировать на запросы клиентов немедленно и «играть на опережение» против конкурентов!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section section-personal-result d-flex">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 left">
                <img src="<?=SITE_TEMPLATE_PATH?>/images/speed-list-bg.png">
            </div>
            <div class="col-md-6 col-sm-12 right">
                <h2>
                    Мы знаем, как решить все эти задачи!
                </h2>
                <div class="list">
                    <div class="list-item">
                        <div class="list-item__title">
                            Принимаем файлы онлайн и сразу в работу!
                        </div>
                        <div class="list-item__description">
                            Постоянным клиентам нет необходимости приезжать в наш офис. Просто загрузите файлы с макетом онлайн, и после проверки мы сразу отправим их на печать.<br/>
                            Так же быстро как распечатать на своем принтере, но гораздо качественнее и дешевле, без потери своего времени. Промышленная цифровая печать до 2-х раз дешевле печати на офисных принтерах!
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="list-item__title">
                            Печатаем ровно столько, сколько нужно и только когда нужно!</div>
                        <div class="list-item__description">
                            Большие тиражи – большие инвестиции и долгие сроки. Цифровая печать по требованию «Пешта Digital®» позволит не только ускорить процесс в десятки раз, но и сэкономить на размерах заказа, его хранении и доставке. Кроме того, вы обеспечите маркетинг и продажи только самыми актуальными версиями материалов. По статистике, цифровая печать по требованию до 2-х раз экономичнее и эффективнее, чем заказ больших тиражей на склад.
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="list-item__title">
                            Доставка заказов экспрессом прямо в ваш офис!
                        </div>
                        <div class="list-item__description">
                            Важна не только скорость печати, но и скорость доставки! Вы можете выехать к нам в офис, пока печатается заказ, а можете заказать доставку в нужное место к определенному времени. Мы все организуем!
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="list-item__title">
                            Нужно повторить тираж? Легко, в 1 клик!
                        </div>
                        <div class="list-item__description">
                            Мы храним рабочие файлы своих постоянных клиентов и они всегда доступны для повторной печати. Все, что нужно сделать, это сказать нам наименование файла, сколько экземпляров, когда и где нужно получить!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section last-section-speed d-flex">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 left">
                <h2 class="left__title mb-3">
                    <span>ДА! Росту продаж. Мобильности. Оперативности. Индивидуальности.</span>
                    Нет авралам, складам, большим тиражам, лишним расходам и проигранным сделкам!
                </h2>
                <div class="left__description">
                    Получите специальное персональное предложение «Пешта Digital®» на постоянное обслуживание и снижение расходов на печать.
                </div>
                <div class="left_button">
                    <a class="red-button" href="/digital/feedback/">Получить персонализированное предложение</a>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 right"><img src="<?=SITE_TEMPLATE_PATH?>/images/last-section-result.png"></div>
        </div>
    </div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
