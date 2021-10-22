<?php

namespace Ensi\B2Cpl\Dto\Response\Part\Tariff;

use Ensi\B2Cpl\Dto\AbstractDto;

/**
 * Данные по доставке в ПВЗ
 * Class DeliveryPvzDto
 * @package Ensi\B2Cpl\Dto\Response\Part\Tariff
 *
 * @property string $name - название типа
 * @property string $description - описание способа доставки
 * @property float $price - тариф для клиента
 * @property float $price_b2cpl - тариф B2CPL
 * @property float $rate_assess - страховой сбор B2CPL
 * @property float $rate_agent  - агентское вознаграждение B2CPL
 * @property int $transport_days - длительность магистральной перевозки компании B2CPL между СЦ приема посылок и городом получателем в рабочих днях
 * @property array|DeliveryPvzInfoDto[] $available_pvz - массив доступных ПВЗ
 */
class DeliveryPvzDto extends AbstractDto
{
    /**
     * DeliveryPvz constructor.
     * @param  array  $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        
        $this->available_pvz = $this->available_pvz ?
            array_map(function ($item) {
                return new DeliveryPvzInfoDto($item);
            }, $this->available_pvz) :
            [];
    }
}
