<footer itemscope itemtype="http://schema.org/WPFooter">
    <div class="container">
        <div class="footer-wrap d-flex bd-highlight">
            <div class="p-2 bd-highlight">
                <a href="/">
                    <img src="<?=SITE_TEMPLATE_PATH;?>/images/logo-footer.svg" alt="ПЕШТА - Типография">
                </a>
                <address>
                    г. Ижевск, ул. Кирова, 113
                </address>
                <div class="footer-time">
                    Пн. – Пт. с 09:00 до 18:00
                </div>
                <div class="footer-phone mt-4">
                    <a href="tel:+73412400200">+7 (3412) 400-200</a>
                </div>
                <a href="#" data-target="#modalCallback" data-toggle="modal">Заказать звонок</a>
            </div>
            <div class="p-2 bd-highlight">
                <ul>
                    <li>
                        <a href="/catalog/">Каталог</a>
                    </li>
                    <li>
                        <a href="/about/">О компании</a>
                    </li>
                    <li>
                        <a href="/biz/">Для бизнеса</a>
                    </li>
                    <!--<li>
                        <a href="/digital/">Пешта Digital</a>
                    </li>-->
                </ul>
                <ul>
                    <li>
                        <a href="/digital/">Пешта Digital</a>
                    </li>
                    <!--<li>
                        <a href="/cases/">Наши кейсы</a>
                    </li>-->
                    <!--<li>
                        <a href="/blog/">Блог</a>
                    </li>-->
                    <li>
                        <a href="/contacts/">Контакты</a>
                    </li>
                    <!--<li>
                        <a href="/rules/">Требования к макетам</a>
                    </li>-->
                </ul>
            </div>
            <div class="ml-auto p-2 bd-highlight">
                <div class="footer-icons">
                    <a href="#"><img src="<?=SITE_TEMPLATE_PATH;?>/images/vk.svg" alt="VKontakte"/></a>
                    <a href="#"><img src="<?=SITE_TEMPLATE_PATH;?>/images/youtube.svg" alt="YouTube"/></a>
                    <a href="#"><img src="<?=SITE_TEMPLATE_PATH;?>/images/telegram.svg" alt="Telegram"/></a>
                    <a href="#"><img src="<?=SITE_TEMPLATE_PATH;?>/images/whatsapp.svg" alt="WhatsApp"/></a>
                    <a href="#"><img src="<?=SITE_TEMPLATE_PATH;?>/images/instagram.svg" alt="Instagram"/></a>
                </div>
                <div class="footer-text-right mt-2">
                    Следите за нами
                </div>
                <div class="footer-mail mt-4">
                    <a href="mailto:info@peshta.ru"><i class="fas fa-envelope"></i> info@peshta.ru</a>
                </div>
            </div>
        </div>
        <div class="footer-copyright row justify-content-center align-items-center">
            ООО "ПЕЧАТНЫЙ САЛОН"&copy; <?=date("Y")?> Все&nbsp;права&nbsp;защищены.&nbsp;<a href="/privacy/">Политика конфиденциальности</a>
        </div>
    </div>
    <meta itemprop="copyrightYear" content="<?=date("Y")?>">
    <meta itemprop="copyrightHolder" content='ООО "ПЕЧАТНЫЙ САЛОН"'>
</footer>
<?$APPLICATION->IncludeComponent(
    "growtag:main.feedback",
    "peshta_callback_modal",
    array(
        "USE_CAPTCHA" => "N",
        "OK_TEXT" => "Заявка на обратный звонок успешно отправлена. Ожидайте звонка наших менеджеров.",
        "EMAIL_TO" => "",
        "REQUIRED_FIELDS" => array(
            0 => "NAME",
        ),
        "EVENT_MESSAGE_ID" => array(
            0 => "7",
        ),
        "COMPONENT_TEMPLATE" => "peshta_callback_modal",
        "USER_CONSENT" => "N",
        "USER_CONSENT_ID" => "0",
        "USER_CONSENT_IS_CHECKED" => "Y",
        "USER_CONSENT_IS_LOADED" => "N"
    ),
    false
);?>
<?$APPLICATION->IncludeComponent(
    "growtag:main.feedback",
    "peshta_settlement_modal",
    array(
        "USE_CAPTCHA" => "N",
        "OK_TEXT" => "Заявка на обратный звонок успешно отправлена. Ожидайте звонка наших менеджеров.",
        "EMAIL_TO" => "",
        "REQUIRED_FIELDS" => array(
            0 => "NAME",
        ),
        "EVENT_MESSAGE_ID" => array(
            0 => "26",
        ),
        "COMPONENT_TEMPLATE" => "peshta_settlement_modal",
        "USER_CONSENT" => "N",
        "USER_CONSENT_ID" => "0",
        "USER_CONSENT_IS_CHECKED" => "Y",
        "USER_CONSENT_IS_LOADED" => "N"
    ),
    false
);?>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallbackRecap&render=6Lf9BLcZAAAAAB05N0PUYAIeA98FEOx_AosAvT67"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.maskedinput.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/app.js"></script>
<script type="text/javascript">
    !function(){
        var t=document.createElement("script");
        t.type="text/javascript",
            t.async=!0,
            t.src="https://vk.com/js/api/openapi.js?168",
            t.onload=function(){
                VK.Retargeting.Init("VK-RTRG-545334-5hDBx"),
                    VK.Retargeting.Hit();
            },
            document.head.appendChild(t);
    }();
</script>
<noscript><img src="https://vk.com/rtrg?p=VK-RTRG-545334-5hDBx" style="position:fixed; left:-999px;" alt=""/></noscript>

<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(65948923, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        ecommerce:"dataLayer"
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/65948923" style="position:absolute; left:-9999px;" alt="" /></div></noscript>

<script>
    (function(w,d,u){
        var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);
        var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
    })(window,document,'https://cdn-ru.bitrix24.ru/b13371058/crm/site_button/loader_4_fiz156.js');
</script>

<script type="text/javascript">
    window.addEventListener('onBitrixLiveChat', function(event)
    {
        var widget = event.detail.widget;

        // Обработка событий
        widget.subscribe({
            type: BX.LiveChatWidget.SubscriptionType.userMessage,
            callback: function(data) {
                return ym(65948923,'reachGoal','konsultant');
            }
        });
    });
</script>
</body>
</html>
