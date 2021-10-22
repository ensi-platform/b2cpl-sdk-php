<?php

namespace Ensi\B2Cpl\Dto\Response\Part\Order;

use Ensi\B2Cpl\Dto\AbstractDto;

/**
 * Загруженное место (коробка) заказа на доставку
 * Class OrderOutputParcelDto
 * @package Ensi\B2Cpl\Dto\Request\Part\Order
 *
 * @property int $number - порядковый номер места (натуральное число начиная с 1..)
 * @property string $code - код места (уникальный код места)
 * @property string $code_b2cpl - код места присвоенный B2CPL
 */
class OrderOutputParcelDto extends AbstractDto
{
}
