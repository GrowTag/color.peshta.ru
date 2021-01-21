<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Персонализированные обращения к клиентам и индивидуальные предложения повышает конверсию в продажи на 35-45%!");
$APPLICATION->SetPageProperty("keywords", "типография, ижевск, визитки, фирменный стиль, заказать визитки, упаковка, печать, штампы, буклеты, полиграфия, нумераторы, полиграфия для бизнеса");
$APPLICATION->SetPageProperty("title", "ПЕШТА - Супер отдача в продажах от персонализированных маркетинговых материалов");
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
    .first-digital-section-result {
        background: url(/local/templates/peshta_growtag/images/1-section-result.png) center no-repeat, linear-gradient(90deg,#c2c2c4, #bbbabd);
        background-size: cover;
    }
    .first-digital-section-result .title-wrap {
        margin-top: 40px;
        margin-bottom: 40px;
        padding:40px;
        background: #ffffff;
        text-align: left;
    }
    .first-digital-section-result .title-wrap .p-description {
        font-size: 18px;
        line-height: 24px;
        color: #5B636F;
    }
    .first-digital-section-result .title-wrap .span-title {
        font-size: 20px;
        line-height: 24px;
        letter-spacing: 0.02em;
        color: #185DC5;
    }
    .first-digital-section-result .title-wrap .orange-wrap {
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
    .first-digital-section-result ul {
        margin-top: 15px;
        list-style: none;
    }
    .first-digital-section-result ul li {
        color: #5B636F;
        line-height: 25px;
    }
    .first-digital-section-result ul li::before {
        content: "\2022";  /* Add content: \2022 is the CSS Code/unicode for a bullet */
        color: #185DC5; /* Change the color */
        font-weight: bold; /* If you want it to be bold */
        display: inline-block; /* Needed to add space between the bullet and the text */
        width: 1em; /* Also needed for space (tweak if needed) */
        margin-left: -1em; /* Also needed for space (tweak if needed) */
    }
    .first-digital-section-result .span-black {
        font-weight: bold;
        font-size: 16px;
        line-height: 20px;
        letter-spacing: 0.02em;
        color: #363636;
        margin-left: 22px;
    }
    .second-digital-section {
        padding: 40px;
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
        top: 60px;
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
        background: url(/local/templates/peshta_growtag/images/list-item.png) top left no-repeat;
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
    .last-section-result {
        background: #f3f3f3;
        padding: 0;
    }
    .last-section-result .left {
        padding: 120px 20px 120px 60px;
        text-align: left;
    }
    .last-section-result .right img{
        height: 100%;
    }
    @media (min-width: 1920px) {
        .question::after {
            top: 7px;
        }
    }
    @media (max-width: 1300px){
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
        .first-digital-section-result {
            padding-left: 0;
            padding-right: 0;
            background: url(/local/templates/peshta_growtag/images/1-section-result.png) top no-repeat;
            background-size: contain;
            padding-top: 40px;
        }
        .first-digital-section-result .title-wrap {
            width: 100% !important;
            flex: 100%;
            padding: 20px !important;
            max-width: 100%;
        }
        .first-digital-section-result .orange-wrap {
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
        .last-section-result {
            padding-bottom: 40px;
        }
        .last-section-result .right {
            padding: 0 0 20px 0;
            order: 1;
        }
        .last-section-result .left {
            padding: 10px 10px 10px 10px;
            text-align: left;
            order: 2;
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

</style>
<div class="section first-digital-section-result d-flex">
    <div class="container">
        <div class="title-wrap col-md-6 col-sm-12">
            <h1 class="title mt-4 mb-3">Супер отдача в продажах от персонализированных маркетинговых материалов</h1>
            <p class="p-description m-0">Выйдите на новый уровень результативности ваших продаж, маркетинга и рекламы с цифровыми технологиями персонализации «Пешта Digital®»</p>
            <br/>
            <span class="span-title">Маркетинговые материалы:</span>
            <br/>
            <ul>
                <li>Раздаточные материалы c QR-кодами</li>
                <li>Почтовые персонализированные рассылки</li>
            </ul>
            <span class="span-black">+ Персонализация буклетов и предложений</span>
            <br/><br/>
            <span class="span-title">Инструменты продаж:</span>
            <ul>
                <li>Презентации</li>
                <li>Буклеты о продуктах и услугах </li>
                <li>Персонализированные промо-материалы</li>
            </ul>
            <span class="span-black">+ Скорость</span>
            <div class="orange-wrap">
                Получайте от маркетинговых материалов больше отдачи!
            </div>
        </div>
    </div>
</div>
<div class="section second-digital-section d-flex">
    <div class="container">
        <div class="row">
            <div class="col-md-4 left question-wrap">
                <div class="question">
                    <div class="question__description">
                        Персонализированные обращения к клиентам и индивидуальные предложения
                    </div>
                    <div class="question__title mb-2 mt-2">
                        повышает конверсию в продажи на 35-45%!
                    </div>
                </div>
            </div>
            <div class="col-md-8 right">
                <h2>Почему цифровая персонализация материалов так важна для каждого бизнеса именно сейчас?</h2><br/>
                <div class="question-list">
                    <div class="question-list-item">
                        <div class="question-list-item__title">
                            Ваши Клиенты хотят индивидуального подхода и особого отношения.
                        </div>
                        <div class="question-list-item__description">
                            Клиенты больше доверяют персонализированным рекламным сообщениям и предложениям. Им также важен индивидуальный подход и личное внимание при каждом контакте в коммуникации, в маркетинговых кампаниях и в процессе продаж! Все материалы должны быть персонализированы!
                        </div>
                    </div>
                    <div class="question-list-item">
                        <div class="question-list-item__title">
                            Вашим Сотрудникам нужны результаты в продажах, новые клиенты и быстрые сделки.
                        </div>
                        <div class="question-list-item__description">
                            По статистике, персонализированные обращения к клиентам и индивидуальные предложения повышают конверсию в продажи на 35-45%!</div>
                    </div>
                    <div class="question-list-item">
                        <div class="question-list-item__title">
                            Вашей Компании нужно получить максимальную отдачу от инвестиций в маркетинг и печатные материалы.</div>
                        <div class="question-list-item__description">
                            Возврат на инвестиции в персонализированные маркетинговые кампании в среднем на 21% больше!<br/>
                            Возврат на инвестиции в персонализированные почтовые рассылки + e-mail в среднем на 39% больше, чем только от e-mail.
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
                <img src="<?=SITE_TEMPLATE_PATH?>/images/list-result-bg.png">
            </div>
            <div class="col-md-6 col-sm-12 right">
                <h2>
                    Мы знаем, как решить эти задачи с помощью цифровых технологий печати и персонализации «Пешта&nbsp;Digital®»
                </h2>
                <div class="list">
                    <div class="list-item">
                        <div class="list-item__title">
                            Каждый экземпляр печатных материалов может быть персонализирован под вашего заказчика в режиме реального времени!
                        </div>
                        <div class="list-item__description">
                            Каждый экземпляр маркетинговых материалов может быть персонализирован под контактные данные и данные профиля вашего Заказчика из базы данных. Персональное обращение, фотография, особый продукт или услуга, отвечающие потребностям и контексту клиента, помогут ему быстрее принять решение в вашу пользу и оценить индивидуальный подход!
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="list-item__title">
                            Путь к решению клиента в вашу пользу становится короче, быстрее и дешевле! А это прямой путь к росту прибыли.</div>
                        <div class="list-item__description">
                            Компании, которые накапливают информацию о своих клиентах и используют ее в своих маркетинговых кампаниях и продажах, получают мощный рычаг против конкурентов, растут в 2-3 раза быстрее и почти на 80% прибыльнее, чем их «коллеги по цеху».</div>
                    </div>
                    <div class="list-item">
                        <div class="list-item__title">
                            Персонализированные посадочная страница + e-mail + почтовая карточка оставят неизгладимое впечатление на вашего клиента и заставят сделать целевое действие!</div>
                        <div class="list-item__description">
                            Почти в 80% случаев клиенты уделяют больше внимания предложениям и маркетинговым материалам, содержащим имя, фамилию и другую информацию о них самих. Потенциальные и постоянные клиенты в подавляющем большинстве случаев выберут ту компанию, которая использует персонализацию и сделают целевое действие, которое от них требуется.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section last-section-result d-flex">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 left">
                <h2 class="left__title">
                    Нужна супер отдача в продажах и маркетинге?
                </h2>
                <div class="left__description">
                    Получите персональное предложение «Пешта  Digital®» на персонализацию маркетинговых материалов и проведение омниканальных рекламных кампаний.
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
