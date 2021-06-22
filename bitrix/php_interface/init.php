<?
use Bitrix\Main\EventManager;

global $USER;

$eventManager = EventManager::getInstance();

$eventManager->addEventHandlerCompatible("main", "OnAfterUserRegister", function(&$fields) {
    if(isset($_COOKIE['calcCookieBackURL']) && CUser::IsAuthorized()){
        LocalRedirect($_COOKIE['calcCookieBackURL']);
    }
});

AddEventHandler("main", "OnBeforeUserRegister", "OnBeforeUserUpdateHandler");
AddEventHandler("main", "OnBeforeUserUpdate", "OnBeforeUserUpdateHandler");
function OnBeforeUserUpdateHandler(&$arFields) {
    $arFields["LOGIN"] = $arFields["EMAIL"];

    return $arFields;
}