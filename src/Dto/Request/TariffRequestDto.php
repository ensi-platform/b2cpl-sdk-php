<?php

namespace Ensi\B2Cpl\Dto\Request;

use Ensi\B2Cpl\Dto\AbstractDto;
use Ensi\B2Cpl\Dto\Request\Part\Tariff\TariffParcelDto;

/**
 * Запрос на расчет тарифов доставки
 * Class TariffRequestDto
 * @package Ensi\B2Cpl\Dto\Request
 * @property string $region - город в котором сдаются заказы на сортировочный центр: 77 – Москва, 78 – Санкт-Петербург, 16 – Казань; обязательный параметр
 * @property string $zip - индекс адреса доставки, обязательный параметр (если не указан kladr_id или fias_id или
* address)
 * @property string $kladr_id - код города адреса доставки в КЛАДР, необязательный параметр
 * @property string $fias_id - код города адреса доставки в ФИАС, необязательный параметр
 * @property string $address - адрес доставки, необязательный параметр
 * @property string $route_code - код маршрута доставки курьером: 1 – доставку до получателя, 2 – возврат от получателя (возврат курьер), 0 - выводить оба варианта; значение
* по умолчанию 1; необязательный параметр
 * @property array|TariffParcelDto[] $parcels - массив мест (коробок)
 * @property float $price_assess - оценочная стоимость, если не указан, берется ноль
 * @property float $price_amount - стоимость к оплате, если не указана, берется ноль
 * @property bool $flag_courier - показывать/не показывать возможность доставки курьером
 * @property bool $flag_pvz - показывать/не показывать варианты ПВЗ
 * @property bool $flag_post - показывать/не показывать варианты доставки почтой
 */
class TariffRequestDto extends AbstractDto
{
}
