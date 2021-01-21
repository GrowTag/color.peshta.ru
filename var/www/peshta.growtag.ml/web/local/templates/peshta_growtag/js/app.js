/********** SLIDERS **********/
$(document).ready(function(){
    $('.reviews-slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        adaptiveHeight: false,
        autoplay: false,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    adaptiveHeight: false
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    adaptiveHeight: false
                }
            }
        ]
    });

    $('.cases-list').slick({
        lazyLoad: 'ondemand',
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: false,
        autoplay: true,
    });

    $('.index-slider').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: false,
        autoplay: true,
    })

    $('.catalog-section-detail-cases__list.mobile').slick({
        /*lazyLoad: 'ondemand',*/
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        infinite: false,
        arrows: false,
    });
});

/********** PRELOADER **********/
var hellopreloader = document.getElementById("hellopreloader_preload");
function fadeOutnojquery(el){
    el.style.opacity = 1;
    var interhellopreloader = setInterval(function(){
        el.style.opacity = el.style.opacity - 0.05;
        if (el.style.opacity <=0.05){
            clearInterval(interhellopreloader);
            hellopreloader.style.display = "none";
        }
    },16);
}

window.onload = function(){
    setTimeout(function(){
        fadeOutnojquery(hellopreloader);
        },10);
};
/********** RECAPTCHA **********/
var onloadCallbackRecap = function() {
    grecaptcha.ready(function () {
        grecaptcha.execute('6Lf9BLcZAAAAAB05N0PUYAIeA98FEOx_AosAvT67', { action: 'contact_callback' }).then(function (token) {
            var recaptchaResponseSubscribe = document.getElementById('recaptchaResponse-subscribe');
            var recaptchaResponseSettlement = document.getElementById('recaptchaResponse-settlement');
            var recaptchaResponseSettlementIndex = document.getElementById('recaptchaResponse-settlement-index');
            var recaptchaResponseCallback = document.getElementById('recaptchaResponse-callback-modal');
            var recaptchaResponseOrderModal = document.getElementById('recaptchaResponse-order-modal');
            var recaptchaResponseModal = document.getElementById('recaptchaResponse-modal');
            var recaptchaResponseReg = document.getElementById('recaptchaResponse-reg');

            if(recaptchaResponseSubscribe){
                recaptchaResponseSubscribe.value = token;
            }
            if(recaptchaResponseSettlement){
                recaptchaResponseSettlement.value = token;
            }
            if(recaptchaResponseSettlementIndex){
                recaptchaResponseSettlementIndex.value = token;
            }
            if(recaptchaResponseCallback){
                recaptchaResponseCallback.value = token;
            }
            if(recaptchaResponseOrderModal){
                recaptchaResponseOrderModal.value = token;
            }
            if(recaptchaResponseModal){
                recaptchaResponseModal.value = token;
            }
            if(recaptchaResponseReg){
                recaptchaResponseReg.value = token;
            }

        });
    });
};
/********** MASKEDINPUT **********/
$(function(){
    $("input[name='user_phone']").mask("+7 (999) 999-99-99");
    $("input[name='PERSONAL_PHONE']").mask("+7 (999) 999-99-99");
    $("input[name='PERSONAL_MOBILE']").mask("+7 (999) 999-99-99");
});
/***** MOBILE MENU EVENTS *****/
$('#js-bootstrap-offcanvas').on('hidden.bs.offcanvas', function (e) {
    $(".ham").removeClass("active");
});
$('#js-bootstrap-offcanvas').on('shown.bs.offcanvas', function (e) {
    $(".ham").addClass("active");
});
