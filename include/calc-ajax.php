<?require_once($_SERVER['DOCUMENT_ROOT']. "/bitrix/modules/main/include/prolog_before.php");

use \Bitrix\Sale;

global $USER;

\Bitrix\Main\Loader::includeModule('sale');

$arParams["DISCOUNT_IBLOCK_ID"] = 19;

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $arResult["ERROR_MESSAGE"] = array();

    /*if(check_bitrix_sessid()){
        /
    } else {
        $arResult["ERROR_MESSAGE"] = array("type"=>"error", "msg"=>"Сессия устарела");
    }*/
    // Проверяем авторизацию
        if(empty($_POST["user_id"]) || !$USER->IsAuthorized()){
            $arResult["ERROR_MESSAGE"] = array("type"=>"popup-not-auth", "msg"=>"Вы не авторизованы, для продолжения вам нужно авторизоваться на сайте.");
        } else {
            // reCAPTCHA
            if(!empty($_POST['recaptchaResponse'])){
                $recaptcha_key = '6Lf9BLcZAAAAAOwHVQDpd7BAGHv3m9f8o-7qzOj-';

                $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
                $recaptcha_params = [
                    'secret' => $recaptcha_key,
                    'response' => $_POST['recaptchaResponse'],
                    'remoteip' => $_SERVER['REMOTE_ADDR'],
                ];

                $ch = curl_init($recaptcha_url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $recaptcha_params);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                $response = curl_exec($ch);
                if (!empty($response)) {
                    $decoded_response = json_decode($response);
                }

                $recaptcha_success = false;

                if ($decoded_response && $decoded_response->score > 0) {
                    $recaptcha_success = $decoded_response->score;
                } else {
                    $arResult["ERROR_MESSAGE"] = array("type"=>"error", "msg"=>"Токен каптчи устарел, перезагрузите страницу и попробуйте еще раз!");
                }
            } else {
                $arResult["ERROR_MESSAGE"] = array("type"=>"error", "msg"=>"Данные каптчи не верны!");
            }

            if(empty($arResult["ERROR_MESSAGE"]))
            {
                // Получаем данные из запроса
                $arResult["PRODUCT"]["PROPERTIES"] = $_POST['properties'];
                $arResult["PRODUCT"]["PRICE"] = htmlspecialcharsbx($_POST['price']);
                $arResult["PRODUCT"]["NAME"] = htmlspecialcharsbx($_POST['product_name']);
                $arResult["PRODUCT"]["ID"] = htmlspecialcharsbx($_POST['product_id']);
                $arResult["PRODUCT"]["QUANTITY"] = htmlspecialcharsbx($_POST['quantity']);

                //Собираем свойства в строку
                $propertiesString = "";

                foreach($arResult["PRODUCT"]["PROPERTIES"] as $prodProperty){
                    $propertiesString .= $prodProperty.";\n\r";
                }

                //Скидка пользователя
                if(isset($_POST["use_imprint"]) && $_POST["use_imprint"] == "Y"){
                    $arParamsUser = array("SELECT" => array("UF_*"));
                    $arFilterUser = array("ID" => htmlspecialcharsbx($_POST["user_id"]));
                    $rsUser = CUser::GetList(($by="ID"), ($order="ASC"), $arFilterUser, $arParamsUser);
                    $arUser = $rsUser->Fetch();

                    if(!isset($arUser["UF_IMPRINT"]) || empty($arUser["UF_IMPRINT"])){
                        $arResult["USER_IMPRINT"] = 0;
                    } else {
                        $arResult["USER_IMPRINT"] = $arUser["UF_IMPRINT"];
                    }

                    // Скидки из иноблока
                    $arSelect = Array("ID", "NAME", "PROPERTY_WIDGET_TEXT", "PROPERTY_TO", "PROPERTY_FROM", "PROPERTY_TO_QUANTITY", "PROPERTY_FROM_QUANTITY", "PROPERTY_DISCOUNT");
                    $arFilter = Array(
                        "IBLOCK_ID"=>IntVal($arParams["DISCOUNT_IBLOCK_ID"]),
                        "ACTIVE_DATE"=>"Y",
                        "ACTIVE"=>"Y",
                    );
                    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>100), $arSelect);
                    while($ob = $res->GetNextElement())
                    {
                        $arFields = $ob->GetFields();

                        if(($arFields['PROPERTY_FROM_VALUE'] <= $arResult["USER_IMPRINT"] && ($arFields['PROPERTY_TO_VALUE'] >= $arResult["USER_IMPRINT"] || $arFields['PROPERTY_TO_VALUE'] == 0)) && ($arFields['PROPERTY_FROM_QUANTITY_VALUE'] <= $arResult["PRODUCT"]["QUANTITY"] && ($arFields['PROPERTY_TO_QUANTITY_VALUE'] >= $arResult["PRODUCT"]["QUANTITY"] || $arFields['PROPERTY_TO_QUANTITY_VALUE'] == 0))){
                            if($arFields['PROPERTY_DISCOUNT_VALUE'] == 0 || empty($arFields['PROPERTY_DISCOUNT_VALUE'])){
                                $arResult["USER_DISCOUNT_PRICE"] = $arResult["PRODUCT"]["PRICE"];
                                $arResult["DISCOUNT_VALUE"] = 0;
                            } else {
                                $arResult["USER_DISCOUNT_PRICE"] = $arResult["PRODUCT"]["PRICE"] * (1 - $arFields['PROPERTY_DISCOUNT_VALUE'] / 100);
                                $arResult["DISCOUNT_VALUE"] = $arFields['PROPERTY_DISCOUNT_VALUE'];
                            }
                        }
                    }
                } else {
                    $arResult["USER_DISCOUNT_PRICE"] = $arResult["PRODUCT"]["PRICE"];
                    $arResult["DISCOUNT_VALUE"] = 0;
                }

                // Округляем цены в большую сторону
                //$arResult["PRODUCT"]["PRICE"] = round($arResult["PRODUCT"]["PRICE"], 0);
                //$arResult["USER_DISCOUNT_PRICE"] = round($arResult["USER_DISCOUNT_PRICE"], 0);

                // Массив для заказа и корзины
                $product = array(
                    'PRODUCT_ID' => $arResult["PRODUCT"]["ID"],
                    'NAME' => $arResult["PRODUCT"]["NAME"],
                    'PRICE' => $arResult["USER_DISCOUNT_PRICE"],
                    'BASE_PRICE' => $arResult["PRODUCT"]["PRICE"],
                    'DISCOUNT_VALUE' => $arResult["DISCOUNT_VALUE"],
                    'DISCOUNT_PRICE' => $arResult["USER_DISCOUNT_PRICE"],
                    'CURRENCY' => 'RUB',
                    'QUANTITY' => 1,
                    "CUSTOM_PRICE" => "Y",
                    'IGNORE_CALLBACK_FUNC' => 'Y',
                    'LID' => SITE_ID,
                );

                // Готовим заказ в корзину
                $basket = Bitrix\Sale\Basket::create(SITE_ID);

                $item = $basket->createItem("catalog", $product["PRODUCT_ID"]);
                unset($product["PRODUCT_ID"]);
                $item->setFields($product);

                //Создание заказа
                $order = Bitrix\Sale\Order::create(SITE_ID, htmlspecialcharsbx($_POST["user_id"]));
                $order->setPersonTypeId(1);
                $order->setBasket($basket);

                //Свойства заказа
                $collection = $order->getPropertyCollection();
                $propertyValueProperties = $collection->getItemByOrderPropertyId(1); // ID Свойства - Свойства заказа
                $propertyValueProperties->setField('VALUE', $propertiesString);
                $propertyValueProperties = $collection->getItemByOrderPropertyId(3); // ID Свойства - Макет
                $propertyValueProperties->setField('VALUE', $file);

                //Отзгузки
                $shipmentCollection = $order->getShipmentCollection();
                $shipment = $shipmentCollection->createItem(
                    Bitrix\Sale\Delivery\Services\Manager::getObjectById(1)
                );

                //Наполняем отгрузку
                $shipmentItemCollection = $shipment->getShipmentItemCollection();

                foreach ($basket as $basketItem)
                {
                    $item = $shipmentItemCollection->createItem($basketItem);
                    $item->setFieldNoDemand('QUANTITY', $basketItem->getQuantity());
                }

                //Оплата
                $paymentCollection = $order->getPaymentCollection();
                $payment = $paymentCollection->createItem(
                    Bitrix\Sale\PaySystem\Manager::getObjectById(2)
                );

                $payment->setField("SUM", $order->getPrice());
                $payment->setField("CURRENCY", $order->getCurrency());

                $result = $order->save();

                if (!$result->isSuccess())
                {
                    $arResult["ERROR_MESSAGE"] = array("type"=>"error", "msg"=>"Что-то пошло не так!..");
                }

                $arResult["OK_MESSAGE"] = array("type"=>"popup", "msg"=>"Ваш заказ №".$order->getId()." успешно сформирован, наши менеджеры свяжутся с вами в течение 30 минут.");
            }
        }

    // Возвращаем результат
    if(empty($arResult["ERROR_MESSAGE"])){
        print json_encode($arResult["OK_MESSAGE"]);
    } else {
        print json_encode($arResult["ERROR_MESSAGE"]);
    }
}
