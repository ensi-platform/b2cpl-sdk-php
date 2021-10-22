<?php

namespace Ensi\B2Cpl\Dto\Request\Part\Tariff;

use Ensi\B2Cpl\Dto\AbstractDto;

/**
 * Место (коробка) для расчета
 * Class ParcelDto
 * @package Ensi\B2Cpl\Dto\Request\Part\Tariff
 * @property int $weight - вес места в гр. (натуральное число), обязательный параметр
 * @property int $x - длина места в см. (натуральное число), необязательный параметр
 * @property int $y - ширина места в см. (натуральное число), необязательный параметр
 * @property int $z - высота места в см. (натуральное число), необязательный параметр
 * @property float $v - объем места в кубических метрах, необязательный параметр
 */
class TariffParcelDto extends AbstractDto
{
}
