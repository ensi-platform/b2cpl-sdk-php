<?php

namespace Ensi\B2Cpl\Dto\Response\Part\Tariff;

use Ensi\B2Cpl\Dto\AbstractDto;

/**
 * Доступный интервал доставки курьером для определенной даты
 * Class CourierAvailableTimeDto
 * @package Ensi\B2Cpl\Dto\Response\Part\Tariff
 *
 * @property string $time_code - код интервала доставки
 * @property int $time_begin - начальный час доставки «С»
 * @property int $time_end - конечный час доставки «ДО»
 */
class CourierAvailableTimeDto extends AbstractDto
{
}
