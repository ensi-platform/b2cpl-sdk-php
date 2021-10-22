# B2Cpl SDK

Пакет для работы с [api](https://api.b2cpl.ru/services/docs/api_b2cpl.pdf) службы доставки B2CPL

## Установка

`composer require ensi/b2cpl-sdk-php`

## Возможности SDK

- Получение тарифа на доставку B2CPL (POST TARIFF)
- Заказ машины для забора посылок (POST TRANSPORT_CALL)
- Отмена заявки на заказ машины (POST TRANSPORT_CANCEL)
- Загрузка заказов (POST ORDER)
- Отправка отправления на возврат (POST ORDER_RETURN)
- Получение текущего статуса отправления(й) и вложений (POST ORDER_STATUS)
- Формирование наклеек (POST STICKER)

## Лицензия

[The MIT License (MIT)](LICENSE.md).