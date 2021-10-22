<?php

namespace Ensi\B2Cpl\Dto\Response\Part\Tariff;

use Ensi\B2Cpl\Dto\AbstractDto;

/**
 * Данные по доставке почтой
 * Class DeliveryPostDto
 * @package Ensi\B2Cpl\Dto\Response\Part\Tariff
 *
 * @property string $code - код способа доставки (его нужно указывать в поле delivery_type
функции ORDER)
 * @property string $name - название способа доставки
 * @property string $description - описание способа доставки
 * @property float $price - тариф для клиента
 * @property float $price_b2cpl - тариф B2CPL
 * @property float $rate_assess - страховой сбор B2CPL
 * @property float $rate_agent  - агентское вознаграждение B2CPL
 */
class DeliveryPostDto extends AbstractDto
{
}
