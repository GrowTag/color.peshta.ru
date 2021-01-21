<?
use Bitrix\Main\EventManager;

$eventManager = EventManager::getInstance();

$eventManager->addEventHandlerCompatible("main", "OnAfterUserRegister", function(&$fields) {
    if(isset($_COOKIE['calcCookieBackURL'])){
        LocalRedirect($_COOKIE['calcCookieBackURL']);
    }
});
