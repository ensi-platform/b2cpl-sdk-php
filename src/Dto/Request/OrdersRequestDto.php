<?php

namespace Ensi\B2Cpl\Dto\Request;

use Ensi\B2Cpl\Dto\AbstractDto;
use Ensi\B2Cpl\Dto\Request\Part\Order\OrderInputDto;

/**
 * Создание/обновление заказов на доставку
 * Class OrdersRequestDto
 * @package Ensi\B2Cpl\Dto\Request
 *
 * @property string $region - город в котором сдаются заказы на сортировочный центр: 77 – Москва, 78 – Санкт-Петербург, 16 – Казань; обязательный параметр
 * @property int $flag_update - 0 – первоначальная загрузка заказа, 1 – обновление заказа, если
* не указан, то используется значение 0. Флаг необходим в том случае, если
* появилась необходимость изменить состав вложений, мест (в том числе
* перераспределение вложений по местам) и/или стоимости доставки и страховой
* стоимости, после того как посылка пошла в обработку. Обновление указанных
* параметров доступно до момента приема посылки на СЦ
 * @property array|OrderInputDto[] $orders - массив заказов
 */
class OrdersRequestDto extends AbstractDto
{
}
