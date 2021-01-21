<?php
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();

/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

global $USER;

use Bitrix\Main,
    Bitrix\Sale\Basket,
    Bitrix\Sale;

CModule::IncludeModule('iblock');
CModule::IncludeModule('sale');
CModule::IncludeModule("catalog");

define('NO_KEEP_STATISTIC', true);
define('NOT_CHECK_PERMISSIONS', true);

if (CModule::IncludeModule('sale')) {
    if($USER->IsAuthorized()){

        $arResult["PARAMS_HASH"] = md5(serialize($arParams).$this->GetTemplateName());

        if($_SERVER["REQUEST_METHOD"] == "GET" && (!isset($_GET["PARAMS_HASH"]) || $arResult["PARAMS_HASH"] === $_GET["PARAMS_HASH"])){

            //Удалить заказ
            if(isset($_GET["delete"]) && !empty($_GET["delete"])){
                $orderId = htmlspecialcharsbx($_GET["delete"]);
                if (CSaleOrder::Delete($orderId)){
                    LocalRedirect($APPLICATION->GetCurPageParam("delOk=".$orderId."&success=".$arResult["PARAMS_HASH"], Array("delete","delOk","success","PARAMS_HASH")));
                } else {
                    $arResult["ERROR_MESSAGE"] = "Возможно заказ уже был удален ранее";
                }
            }

            //Дублировать заказ
            if(isset($_GET["copy"]) && !empty($_GET["copy"])){
                // Почистим лишние каки в запросе
                $orderId = htmlspecialcharsbx($_GET["copy"]);

                if (isset($_REQUEST['copy']) && $_REQUEST['copy'] > 0){

                    $ORDER_ID = intval($orderId); // ID текущего заказа

                    $order = \Bitrix\Sale\Order::load($ORDER_ID); // объект заказа

                    if ($order) {

                        // методы оплаты
                        $paymentCollection = $order->getPaymentCollection();
                        foreach ($paymentCollection as $payment) {
                            $paySysID = $payment->getPaymentSystemId(); // ID метода оплаты
                            $paySysName = $payment->getPaymentSystemName(); // Название метода оплаты
                        }

                        // службы доставки
                        $shipmentCollection = $order->getShipmentCollection();
                        foreach ($shipmentCollection as $shipment) {
                            if ($shipment->isSystem()) continue;
                            $shipID = $shipment->getField('DELIVERY_ID'); // ID службы доставки
                            $shipName = $shipment->getField('DELIVERY_NAME'); // Название службы доставки
                        }


                        // объект нового заказа
                        $orderNew = \Bitrix\Sale\Order::create(SITE_ID, $USER->GetID());

                        // код валюты
                        $orderNew->setField('CURRENCY', $order->getCurrency());

                        // задаём тип плательщика
                        $orderNew->setPersonTypeId($order->getPersonTypeId());

                        // создание корзины
                        $basketNew = Basket::create(SITE_ID);

                        // дублируем корзину заказа
                        $basket = $order->getBasket();

                        foreach ($basket as $key => $basketItem) {

                            print $basketItem->getField("DISCOUNT_PRICE");
                            $item = $basketNew->createItem('catalog', $basketItem->getProductId());
                            $item->setFields(
                                array(
                                    'PRODUCT_ID' => $basketItem->getProductId(),
                                    'NAME' => $basketItem->getField("NAME"),
                                    'PRICE' => $basketItem->getPrice(),
                                    'BASE_PRICE' => $basketItem->getField("BASE_PRICE"),
                                    'DISCOUNT_VALUE' => $basketItem->getField("DISCOUNT_VALUE"),
                                    'DISCOUNT_PRICE' => $basketItem->getField("DISCOUNT_PRICE"),
                                    'CURRENCY' => $order->getCurrency(),
                                    'QUANTITY' => $basketItem->getQuantity(),
                                    "CUSTOM_PRICE" => "Y",
                                    'IGNORE_CALLBACK_FUNC' => 'Y',
                                    'LID' => SITE_ID,
                                    //'PRODUCT_PROVIDER_CLASS' => '\CCatalogProductProvider',
                                )
                            );
                        }

                        // привязываем корзину к заказу
                        $orderNew->setBasket($basketNew);

                        // задаём службу доставки
                        $shipmentCollectionNew = $orderNew->getShipmentCollection();
                        $shipmentNew = $shipmentCollectionNew->createItem(
                            Bitrix\Sale\Delivery\Services\Manager::getObjectById(1)
                        );

                        // пересчёт стоимости доставки
                        $shipmentCollectionNew->calculateDelivery();

                        // задаём метод оплаты
                        $paymentCollectionNew = $orderNew->getPaymentCollection();
                        $paymentNew = $paymentCollectionNew->createItem(
                            Bitrix\Sale\PaySystem\Manager::getObjectById(2)
                        );

                        // задаём свойства заказа
                        $propertyCollection = $order->getPropertyCollection();
                        $propertyCollectionNew = $orderNew->getPropertyCollection();

                        foreach ($propertyCollection as $property) {

                            // получаем свойство в коллекции нового заказа
                            $somePropValue = $propertyCollectionNew->getItemByOrderPropertyId($property->getPropertyId());

                            // задаём значение свойства
                            $somePropValue->setValue($property->getField('VALUE'));
                        }

                        // сохраняем новый заказ
                        $orderNew->doFinalAction(true);
                        $rs = $orderNew->save();

                        $order_id = $orderNew->getId();
                        // проверяем результат, присваивает статус ответа
                        if ($rs->isSuccess()) {
                            LocalRedirect($APPLICATION->GetCurPageParam("copyOk=".$orderId."&success=".$arResult["PARAMS_HASH"], Array("copy","copyOk","success","PARAMS_HASH")));
                        } else {
                            $arResult['ERROR_MESSAGE'] = 'При копировании заказа что-то пошло не так...';
                        }
                    }
                }
            }
        }

        $nav = new \Bitrix\Main\UI\PageNavigation("page");
        $nav->allowAllRecords(true)
            ->setPageSize(10)
            ->initFromUri();

        if(isset($_GET['filter']) && $_GET["filter"] == "M"){
            $parameters = [
                'filter' => [
                    "USER_ID" => $USER->GetID(),
                    ">=DATE_INSERT" => date($DB->DateFormatToPHP(CSite::GetDateFormat("SHORT")), mktime(0, 0, 0, date("n"), 1, date("Y")))
                ],
                'order' => ["DATE_INSERT" => "DESC"],
            ];
        } elseif (isset($_GET['filter']) && $_GET["filter"] == "Y"){
            $parameters = [
                'filter' => [
                    "USER_ID" => $USER->GetID(),
                    ">=DATE_INSERT" => date($DB->DateFormatToPHP(CSite::GetDateFormat("SHORT")), mktime(0, 0, 0, 1, 1, date("Y")))
                ],
                'order' => ["DATE_INSERT" => "DESC"],
            ];
        } elseif ((isset($_GET['filter']) && $_GET["filter"] == "ALL") || !isset($_GET["filter"])){
            $parameters = [
                'filter' => [
                    "USER_ID" => $USER->GetID(),
                ],
                'order' => ["DATE_INSERT" => "DESC"],
            ];
        }

        $navCount = \Bitrix\Sale\Order::getList($parameters)->getSelectedRowsCount();
        $nav->setRecordCount($navCount);

        $parameters['limit'] = $nav->getLimit();
        $parameters['offset'] = $nav->getOffset();

        $dbRes = \Bitrix\Sale\Order::getList($parameters);

        $arResult["NAV"] = $nav;

        while ($order = $dbRes->Fetch())
        {
            $obBasket = CSaleBasket::GetList(array("ID" => "ASC"), array("FUSER_ID" => CSaleBasket::GetBasketUserID(), "LID" => SITE_ID, 'ORDER_ID' => $order["ID"], 'USER_ID'=>$USER->GetID()));

            while($bItem = $obBasket->Fetch()){
                //Свойства заказа
                $arProperties = array();
                $db_props = CSaleOrderPropsValue::GetOrderProps($order["ID"]);

                //Собираем свойства в массив
                while($prop = $db_props->Fetch()){
                    $arProperties[] = $prop;
                }

                //Собираем резалт
                $arResult["ORDERS"][] = array(
                    "ID" => $order["ID"],
                    "NUMBER" => $order["ACCOUNT_NUMBER"],
                    "BASE_PRICE" => round($bItem["BASE_PRICE"], 2),
                    "PRICE" => round($order["PRICE"], 2),
                    "PRODUCT_NAME" => $bItem["NAME"],
                    "DATE" => $bItem["DATE_INSERT"],
                    "STATUS" => CSaleStatus::GetByID($order["STATUS_ID"]),
                    "PROPERTIES" => $arProperties,
                );
            }
        }
    }
}
//Разбираемся с результатом
if($_REQUEST["success"] == $arResult["PARAMS_HASH"])
{
    if($_REQUEST["page"]){
        LocalRedirect($APPLICATION->GetCurPageParam("page=".$_REQUEST["page"], Array("delete","delOk","copy","copyOk","success","PARAMS_HASH","page")));
    }
    if(isset($_REQUEST['delOk'])){
        $arResult["OK_MESSAGE"] = "Заказ успешно удален";
    }
    if(isset($_REQUEST['copyOk'])){
        $arResult['OK_MESSAGE'] = 'Новый заказ успешно создан';
    }
}

$this->IncludeComponentTemplate();
