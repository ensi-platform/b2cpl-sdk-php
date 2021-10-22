<?php

namespace Ensi\B2Cpl\Dto\Response\Part\Tariff;

use Ensi\B2Cpl\Dto\AbstractDto;

/**
 * Ближайший доступный день доставки для определенного тарифа
 * Class CourierAvailableDateDto
 * @package Ensi\B2Cpl\Dto\Response\Part\Tariff
 *
 * @property string $date - дата доставки
 * @property array|CourierAvailableTimeDto[] $times - массив доступных интервалов времени доставки
 */
class CourierAvailableDateDto extends AbstractDto
{
    /**
     * DeliveryCourier constructor.
     * @param  array  $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        
        $this->times = $this->times ?
            array_map(function ($item) {
                return new CourierAvailableDateDto($item);
            }, $this->times) :
            [];
    }
}
