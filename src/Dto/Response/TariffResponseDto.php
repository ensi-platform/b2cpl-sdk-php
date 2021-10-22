<?php

namespace Ensi\B2Cpl\Dto\Response;

use Ensi\B2Cpl\Dto\AbstractDto;
use Ensi\B2Cpl\Dto\Response\Part\Tariff\DeliveryCourierDto;
use Ensi\B2Cpl\Dto\Response\Part\Tariff\DeliveryPostDto;
use Ensi\B2Cpl\Dto\Response\Part\Tariff\DeliveryPvzDto;

/**
 * Ответ на расчет тарифов доставки
 * Class TariffResponseDto
 * @package Ensi\B2Cpl\Dto\Response
 *
 * @property bool $success - показывает успешно ли выполнен запрос
 * @property string $message - описание ошибки (если success = false), свободный текст
 * @property bool $flag_delivery - показывает возможность доставки, true - возможна, false – невозможна
 * @property array|DeliveryCourierDto[] $delivery_courier - массив с данными по курьерской доставке
 * @property array|DeliveryPvzDto[] $delivery_pvz - массив с доступными ПВЗ
 * @property array|DeliveryPostDto[] $delivery_post - массив с доступными типами отправки Почтой
 */
class TariffResponseDto extends AbstractDto
{
    /** @var array - поля с информацией о ПВЗ */
    protected const PVZ_INFO = [
        'code',
        'code_partner',
        'flag_partial',
        'work_time',
        'gps',
        'address',
        'partner_name',
        'parcels_quantity_max',
    ];
    
    /**
     * TariffResponseDto constructor.
     * @param  array  $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
    
        $this->delivery_courier = $this->delivery_courier ?
            array_map(function ($item) {
                return new DeliveryCourierDto($item);
            }, $this->delivery_courier) :
            [];
        
        //Группируем данные по ПВЗ по одинаковой цене доставки
        $deliveryPvz = [];
        if (!is_null($this->delivery_pvz)) {
            $pvzByPrices = [];
            foreach ($this->delivery_pvz as $pvz) {
                $pvzByPrices['price-' . $pvz['price']][] = $pvz;
            }
            $i = 0;
            foreach ($pvzByPrices as $pvzByPrice) {
                $firstPvz = $pvzByPrice[0];
                $deliveryPvz[$i] = [
                    'name' => $firstPvz['name'],
                    'description' => $firstPvz['description'],
                    'price' => $firstPvz['price'],
                    'price_b2cpl' => $firstPvz['price_b2cpl'],
                    'rate_assess' => $firstPvz['rate_assess'],
                    'rate_agent' => $firstPvz['rate_agent'],
                    'transport_days' => $firstPvz['transport_days'],
                    'available_pvz' => [],
                ];
        
                foreach ($pvzByPrice as $pvz) {
                    $pvzInfo = [];
            
                    foreach ($pvz as $key => $value) {
                        if (in_array($key, static::PVZ_INFO)) {
                            $pvzInfo[$key] = $value;
                        }
                    }
            
                    $deliveryPvz[$i]['available_pvz'][] = $pvzInfo;
                }
        
                $i++;
            }
        }
        $this->delivery_pvz = $deliveryPvz ?
            array_map(function ($item) {
                return new DeliveryPvzDto($item);
            }, $deliveryPvz) :
            [];
    
        $this->delivery_post = $this->delivery_post ?
            array_map(function ($item) {
                return new DeliveryPostDto($item);
            }, $this->delivery_post) :
            [];
    }
}