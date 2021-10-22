<?php

namespace Ensi\B2Cpl\Dto\Response;

use Ensi\B2Cpl\Dto\AbstractDto;
use Ensi\B2Cpl\Dto\Response\Part\Order\OrderOutputDto;

/**
 * Ответ на создание/обновление заказа на доставку
 * Class OrdersResponseDto
 * @package Ensi\B2Cpl\Dto\Response
 *
 * @property array|OrderOutputDto[] $orders - массив заказов с результатом загрузки
 */
class OrdersResponseDto extends AbstractDto
{
    /**
     * OrdersResponseDto constructor.
     * @param  array  $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
    
        $this->orders = $this->orders ?
            array_map(function ($item) {
                return new OrderOutputDto($item);
            }, $this->orders) :
            [];
    }
}