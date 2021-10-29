# B2Cpl SDK

Пакет для работы с [api](https://api.b2cpl.ru/services/docs/api_b2cpl.pdf) службы доставки B2CPL

## Установка

`composer require ensi/b2cpl-sdk-php`

## Возможности SDK

### Создание объекта для подключения

```php
use Ensi\B2Cpl\Adapter\GuzzleAdapter;
use Ensi\B2Cpl\B2Cpl;

$adapter = new GuzzleAdapter('your login', 'your key'); //prod adapter
$adapter = new GuzzleAdapter(); //test adapter

$service = new B2Cpl($adapter);
```

### Получение тарифа на доставку B2CPL (POST TARIFF)

```php
use Ensi\B2Cpl\Dto\Request\Part\Tariff\TariffParcelDto;
use Ensi\B2Cpl\Dto\Request\TariffRequestDto;

$tariffRequestDto = new TariffRequestDto(); //Запрос на расчет тарифов доставки

$tariffRequestDto->region = 77; //город в котором сдаются заказы на сортировочный центр: 77 – Москва, 78 – Санкт-Петербург, 16 – Казань
$tariffRequestDto->zip = 124482; //индекс адреса доставки, обязательный параметр (если не указан kladr_id или fias_id или address)
$tariffRequestDto->fias_id = 'ec44c0ee-bf24-41c8-9e1c-76136ab05cbf'; //код города адреса доставки в ФИАС, необязательный параметр
$tariffRequestDto->address = 'г. Москва, г. Зеленоград, корп 322а'; //адрес доставки, необязательный параметр
$tariffRequestDto->route_code = 1; //код маршрута доставки курьером: 1 – доставку до получателя, 2 – возврат от получателя (возврат курьер), 0 - выводить оба варианта; значение по умолчанию 1; необязательный параметр

$parcel = new TariffParcelDto(); //Место (коробка) для расчета
$tariffRequestDto->parcels = [$parcel];
$parcel->weight = 100; //вес места в гр. (натуральное число), обязательный параметр
$parcel->x = 10; //длина места в см. (натуральное число), необязательный параметр
$parcel->y = 20; //ширина места в см. (натуральное число), необязательный параметр
$parcel->z = 30; //высота места в см. (натуральное число), необязательный параметр

$tariffResponseDto = $service->calculator()->calculate($tariffRequestDto); //Ответ на расчет тарифов доставки
```

### Заказ машины для забора посылок (POST TRANSPORT_CALL)

```php
use Ensi\B2Cpl\Dto\Request\CourierCallRequestDto;

$courierCallRequestDto = new CourierCallRequestDto(); //Создание заявки на заказ машины для забора посылок
$courierCallRequestDto->address = 'г. Москва, ул. Академика Королева, д. 12'; //адрес для забора в формате UrlEncode*
$courierCallRequestDto->person = 'Отправителев Отправитель Отправителевич'; //контактное лицо в формате UrlEncode*
$courierCallRequestDto->phone = '+79031234567'; //контактный телефон в формате UrlEncode*
$courierCallRequestDto->date = '01.01.2021'; //дата забора в формате DD.MM.YYYY, например 19.07.2013*
$courierCallRequestDto->time = '0912'; //интервал времени для забора. Одно из фиксированных значений 0912, 1215, 1518, 1821. Что означает с 9 часов до 12, с 12 до 15 и т.д.*
$courierCallRequestDto->quantity = 1; //предполагаемое количество посылок*
$courierCallRequestDto->volume = 10 * 20 * 30; //предполагаемый суммарный объем груза*
$courierCallRequestDto->weight = 100; //предполагаемый суммарный вес груза*
$courierCallRequestDto->number = '123'; //номер документа (заявки) клиента
$courierCallRequestDto->client_name = 'ООО Ромашка'; //название клиента. Используется в случае если заявки создаются в разные адреса для разных ИМ
$courierCallRequestDto->load = 1; //признак того, что погрузочные работы должны осуществляться исполнителем и, возможно, будут тарифицированы. 1 – погрузочные работы осуществляются исполнителем, 0 – погрузочные работы осуществляются заказчиком. Необязательный параметр, по умолчанию принимается равным 0

$courierCallResponseDto = $service->courierCall()->create($courierCallRequestDto); //Ответ на создание заявки на заказ машины для забора посылок
```

### Отмена заявки на заказ машины (POST TRANSPORT_CANCEL)

```php
use Ensi\B2Cpl\Dto\Request\CourierCallCancelRequestDto;

$courierCallCancelRequestDto = new CourierCallCancelRequestDto();
$courierCallCancelRequestDto->id = '1479'; //ID номер ранее сформированной заявки на забор посылок

$courierCallCancelResponseDto = $service->courierCall()->cancel($courierCallCancelRequestDto); //Ответ на отмену заявки на заказ машины для забора посылок
```

### Загрузка заказов (POST ORDER)

```php
use Ensi\B2Cpl\Dto\Request\OrdersRequestDto;
use Ensi\B2Cpl\Dto\Request\Part\Order\OrderInputDto;
use Ensi\B2Cpl\Dto\Request\Part\Order\OrderInputParcelDto;
use Ensi\B2Cpl\Dto\Request\Part\Order\OrderInputParcelItemDto;

$ordersRequestDto = new OrdersRequestDto(); //Создание/обновление заказов на доставку
$ordersRequestDto->region = 77; //город в котором сдаются заказы на сортировочный центр: 77 – Москва, 78 – Санкт-Петербург, 16 – Казань; обязательный параметр
$ordersRequestDto->flag_update = 0; //0 – первоначальная загрузка заказа, 1 – обновление заказа

$order = new OrderInputDto();
$ordersRequestDto->orders = [$order];
$order->sender = 'ООО Ромашка'; //отправитель
$order->code = '10012345'; //уникальный код заказа в системе заказчика*
$order->fio = 'Получателев Получатель Получателевич'; //ФИО получателя*
$order->zip = 124482; //индекс получателя*
$order->region = 'г. Москва'; //регион получателя
$order->city = 'г. Зеленоград'; //город получателя
$order->address = 'г. Москва, г. Зеленоград, корп 322а'; //адрес получателя*
$order->phone1 = '+79161234567'; //телефон получателя*
$order->email = 'recipient@mail.ru'; //e-mail адрес получателя
$order->price_assess = 0; //оценочная стоимость заказа
$order->price_delivery = 150; //полная стоимость доставки
$order->price_delivery_pay = 150; //стоимость доставки к оплате
$order->amount_prepaid = 0; //сумма предоплаты
$order->delivery_type = 12; //тип доставки (code из функции TARIF)*
$order->delivery_date = '03.01.2021'; //дата доставки
$order->delivery_time = '1215'; //интервал доставки
$order->flag_open = 0; //возможность вскрытия (по умолчанию 2): 0 - вскрытие запрещено; 1 - вскрытие разрешено; 2 - вскрытие только внешней упаковки
$order->comment = 'Три раза позвонить в дверь'; //комментарий к заказу

$parcel = new OrderInputParcelDto(); //Место (коробка) заказа на доставку
$order->parcels = [$parcel]; //массив мест (коробок)*
$parcel->number = 1; //порядковый номер места (натуральное число начиная с 1..)
$parcel->code = '10012345-01-1'; //код места (уникальный код места)
$parcel->weight = 100; //вес места в граммах
$parcel->dim_x = 100; //длина в миллиметрах (габариты места)
$parcel->dim_y = 200; //ширина в миллиметрах (габариты места)
$parcel->dim_z = 300; //высота в миллиметрах (габариты места)

$item = new OrderInputParcelItemDto(); //Состав места (коробки) заказа на доставку
$parcel->items = [$item]; //состав места
$item->prodcode = '4603123456789'; //артикул
$item->prodname = 'Чехол для ноутбука'; //наименование*
$item->quantity = 1; //количество*
$item->weight = 100; //вес единицы товара в граммах*
$item->price = 1000; //стоимость единицы товара*
$item->price_pay = 1000; //стоимость единицы товара к оплате*
$item->price_assess = 0; //страховая стоимость единицы товара
$item->vat = 20; //НДС товара, необязательное поле (значения: 0, 10, 20), значение 0 расценивается как «НДС не облагается»

$ordersResponseDto = $service->orders()->create($ordersRequestDto); //Ответ на создание заказа на доставку
$ordersResponseDto = $service->orders()->update($ordersRequestDto); //Ответ на обновление заказа на доставку
```

### Отправка отправления на возврат (POST ORDER_RETURN)

```php
use Ensi\B2Cpl\Dto\Request\OrderCancelRequestDto;

$orderCancelRequestDto = new OrderCancelRequestDto(); //Возврат/отмена заказа на доставку
$orderCancelRequestDto->code_b2cpl = '9782353'; //код заказа в B2CPL*

$orderCancelResponseDto = $service->orders()->cancel($orderCancelRequestDto); //Ответ на возврат/отмену заказа на доставку
```

### Получение текущего статуса отправления(й) и вложений (POST ORDER_STATUS)

```php
use Ensi\B2Cpl\Dto\Request\OrdersStatusRequestDto;

$ordersStatusRequestDto = new OrdersStatusRequestDto(); //Получение статусов заказов на доставку
$ordersStatusRequestDto->code_type = OrdersStatusRequestDto::CODE_TYPE_B2CPL; //тип кода, по которому осуществляет поиск отправлений, может принимать значения: b2cpl - код присвоенный B2CPL и client - код присвоенный заказчиком
$ordersStatusRequestDto->codes = ['9782353']; //массив номеров заказов, по которым осуществляется запрос

$ordersStatusResponseDto = $service->orders()->status($ordersStatusRequestDto); //Ответ на получение статусов заказов на доставку
```

### Формирование наклеек (POST STICKER)

```php
use Ensi\B2Cpl\Dto\Request\Part\Sticker\StickerCodeDto;
use Ensi\B2Cpl\Dto\Request\Part\Sticker\StickerCodeParcelDto;
use Ensi\B2Cpl\Dto\Request\Part\Sticker\StickerFormatDto;
use Ensi\B2Cpl\Dto\Request\StickerRequestDto;

$stickerRequestDto = new StickerRequestDto(); //Формирование штрихкодов для заказа на доставку для всех или определенных мест заказа
$stickerFormatDto = new StickerFormatDto(); //Формат штрихкода
$stickerRequestDto->format = $stickerFormatDto; //формат наклейки, обязательный параметр
$stickerFormatDto->type = StickerFormatDto::TYPE_58_60; //тип формата, обязательный параметр
$stickerCodeDto = new StickerCodeDto();
$stickerRequestDto->codes = [$stickerCodeDto]; //массив кодов посылок (указываются коды B2CPL, полученные при регистрации заказа через функцию ORDER)
$stickerCodeDto->code = '9782353'; //код заказа B2CPL

$stickerCodeParcelDto = new StickerCodeParcelDto(); //Штрихкод для места в посылке
$stickerCodeDto->parcels = [$stickerCodeParcelDto]; // массив мест (указывается код места B2CPL, если не указан, то наклейки формируются на все места), необязательный параметр
$stickerCodeParcelDto->code = '9782353-1'; //код места в заказе B2CPL

$stickerResponseDto = $service->orders()->barcodes($stickerRequestDto); //Ответ на получение штрихкодов
```

## Лицензия

[The MIT License (MIT)](LICENSE.md).