<?php

namespace Ensi\B2Cpl\Dto\Response\Part\Order;

use Ensi\B2Cpl\Dto\AbstractDto;

/**
 * Результат загрузки заказа на доставку
 * Class OrderOutputDto
 * @package Ensi\B2Cpl\Dto\Response\Part\Order
 *
 * @property string $code - уникальный код заказа в системе заказчика, обязательное поле
 * @property string $code_b2cpl - код B2CPL (если есть)
 * @property bool $success - результат загрузки заказа (true – заказ успешно загружен, false – заказ загружен с ошибкой)
 * @property string $message - описание ошибки (если success = false)
 *
 * @property array|OrderOutputParcelDto[] $parcels - загруженные места (коробка) заказа на доставку
 */
class OrderOutputDto extends AbstractDto
{
    /**
     * OrderOutputDto constructor.
     * @param  array  $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        
        $this->parcels = $this->parcels ?
            array_map(function ($item) {
                return new OrderOutputParcelDto($item);
            }, $this->parcels) :
            [];
    }
}
