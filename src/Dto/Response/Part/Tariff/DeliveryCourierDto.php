<?php

namespace Ensi\B2Cpl\Dto\Response\Part\Tariff;

use Ensi\B2Cpl\Dto\AbstractDto;

/**
 * Данные по курьерской доставке
 * Class DeliveryCourierDto
 * @package Ensi\B2Cpl\Dto\Response\Part\Tariff
 *
 * @property string $route_code - код маршрута доставки курьером: 1 – доставку до получателя, 2 – возврат от получателя (возврат курьер)
 * @property string $code - код способа доставки (его нужно указывать в поле delivery_type
* функции ORDER)
 * @property string $name - название способа доставки
 * @property string $description - описание способа доставки
 * @property float $price - тариф для клиента
 * @property float $price_b2cpl - тариф B2CPL
 * @property float $rate_assess - страховой сбор B2CPL
 * @property float $rate_agent  - агентское вознаграждение B2CPL
 * @property bool $flag_partial - возможность частичного отказа
 * @property int $transport_days - длительность магистральной перевозки компании B2CPL между СЦ приема посылок и городом получателем в рабочих днях
 * @property string $zone1 - номер основной тарифной зоны B2CPL
 * @property string $zone2 - номер дополнительной тарифной зоны B2CPL
 * @property array|CourierAvailableDateDto[] $available_dates - массив ближайших доступных дней доставки
 */
class DeliveryCourierDto extends AbstractDto
{
    /**
     * DeliveryCourier constructor.
     * @param  array  $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
    
        $this->available_dates = $this->available_dates ?
            array_map(function ($item) {
                return new CourierAvailableDateDto($item);
            }, $this->available_dates) :
            [];
    }
}
