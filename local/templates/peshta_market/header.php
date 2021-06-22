<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.22/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,700&amp;subset=cyrillic" rel="stylesheet">
    <?$APPLICATION->ShowHead();?>
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/style.css">
</head>
<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<nav class="uk-container uk-margin uk-flex uk-flex-between uk-visible@s">
    <div class="navbar-left">
        <a class="uk-navbar-item uk-logo" href="/">
            <img src="<?=SITE_TEMPLATE_PATH?>/images/logo.svg" alt="Пешта - Маркет">
        </a>
    </div>
    <div class="navbar-center">
        <div class="uk-navbar-item">
            <form action="javascript:void(0)">
                <input class="uk-input uk-form-width-auto" type="text" placeholder="Искать товары">
                <button class="uk-button uk-button-default">Button</button>
            </form>
        </div>
    </div>
    <div class="navbar-right">
        <div class="uk-navbar-item">Корзина</div>
        <div class="uk-navbar-item">вход</div>
    </div>
</nav>