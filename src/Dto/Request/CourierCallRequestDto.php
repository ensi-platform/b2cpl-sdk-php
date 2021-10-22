<?php

namespace Ensi\B2Cpl\Dto\Request;

use Ensi\B2Cpl\Dto\AbstractDto;

/**
 * Создание заявки на заказ машины для забора посылок
 * Class CourierCallRequestDto
 * @package Ensi\B2Cpl\Dto\Request
 *
 * @property string $address - адрес для забора в формате UrlEncode*
 * @property string $person - контактное лицо в формате UrlEncode*
 * @property string $phone - контактный телефон в формате UrlEncode*
 * @property string $comment - комментарии к заявке в свободной форме в формате UrlEncode
 * @property string $date - дата забора в формате DD.MM.YYYY, например 19.07.2013*
 * @property string $time - интервал времени для забора. Одно из фиксированных значений 0912, 1215, 1518, 1821. Что означает с 9 часов до 12, с 12 до 15 и т.д.*
 * @property int $quantity - предполагаемое количество посылок*
 * @property float $volume - предполагаемый суммарный объем груза*
 * @property float $weight - предполагаемый суммарный вес груза*
 * @property string $number - номер документа (заявки) клиента
 * @property string $client_name - название клиента. Используется в случае если заявки создаются в разные адреса для разных ИМ
 * @property string $load - признак того, что погрузочные работы должны осуществляться исполнителем и, возможно, будут тарифицированы. 1 – погрузочные работы осуществляются исполнителем, 0 – погрузочные работы осуществляются заказчиком. Необязательный параметр, по умолчанию принимается равным 0
 */
class CourierCallRequestDto extends AbstractDto
{
}
