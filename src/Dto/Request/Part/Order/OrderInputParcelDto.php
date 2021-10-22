<?php

namespace Ensi\B2Cpl\Dto\Request\Part\Order;

use Ensi\B2Cpl\Dto\AbstractDto;

/**
 * Место (коробка) заказа на доставку
 * Class OrderInputParcelDto
 * @package Ensi\B2Cpl\Dto\Request\Part\Order
 *
 * @property int $number - порядковый номер места (натуральное число начиная с 1..)
 * @property string $code - код места (уникальный код места)
 * @property int $weight - вес места в граммах
 * @property int $dim_x - длина в миллиметрах (габариты места)
 * @property int $dim_y - ширина в миллиметрах (габариты места)
 * @property int $dim_z - высота в миллиметрах (габариты места)
 * @property array|OrderInputParcelItemDto[] $items - состав места
 */
class OrderInputParcelDto extends AbstractDto
{
}
