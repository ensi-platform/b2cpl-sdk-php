<?php

namespace Ensi\B2Cpl\Dto\Response\Part\Tariff;

use Ensi\B2Cpl\Dto\AbstractDto;

/**
 * Информация по ПВЗ
 * Class DeliveryPvzInfoDto
 * @package Ensi\B2Cpl\Dto\Response\Part\Tariff
 *
 * @property string $code - код ПВЗ доставки (его нужно указывать в поле delivery_type функции ORDER)
 * @property string $code_partner - код ПВЗ партнера (Boxberry/DRHL/CDEK)
 * @property bool $flag_partial - возможность частичного отказа
 * @property string $work_time - время работы
 * @property DeliveryPvzInfoGpsDto|null $gps - GPS координаты
 * @property string $address - адрес
 * @property string $partner_name - название партнера (B2CPL/Boxberry/…)
 * @property int $parcels_quantity_max - максимальное количество мест в одном заказе
 */
class DeliveryPvzInfoDto extends AbstractDto
{
    /**
     * DeliveryPvzInfo constructor.
     * @param  array  $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        
        if ($this->gps) {
            $matches = [];
            preg_match('/^lng:(.*); lat:(.*)$/', $this->gps, $matches);
            $this->gps = new DeliveryPvzInfoGpsDto([
                'lng' => $matches[1],
                'lat' => $matches[2],
            ]);
        } else {
            $this->gps = null;
        }
    }
}
