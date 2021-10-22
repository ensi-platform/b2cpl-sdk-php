<?php

namespace Ensi\B2Cpl\Dto\Request\Part\Order;

use Ensi\B2Cpl\Dto\AbstractDto;

/**
 * Состав места (коробки) заказа на доставку
 * Class OrderInputParcelItemDto
 * @package Ensi\B2Cpl\Dto\Request\Part\Order
 *
 * @property string $prodcode - артикул
 * @property string $prodname - наименование*
 * @property int $quantity - количество*
 * @property float $weight - вес единицы товара в граммах*
 * @property float $price - стоимость единицы товара*
 * @property float $price_pay - стоимость единицы товара к оплате*
 * @property float $price_assess - страховая стоимость единицы товара
 * @property int $vat - НДС товара, необязательное поле (значения: 0, 10, 20), значение 0 расценивается как «НДС не облагается»
 */
class OrderInputParcelItemDto extends AbstractDto
{
}
