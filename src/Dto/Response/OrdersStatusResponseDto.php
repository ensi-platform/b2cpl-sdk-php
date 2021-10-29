<?php

namespace Ensi\B2Cpl\Dto\Response;

use Ensi\B2Cpl\Dto\AbstractDto;
use Ensi\B2Cpl\Dto\Response\Part\OrderStatus\OrderStatusOutputDto;

/**
 * Ответ на получение статусов заказов на доставку
 * Class OrdersStatusResponseDto
 * @package Ensi\B2Cpl\Dto\Response
 *
 * @property array|OrderStatusOutputDto[] $orders - массив заказов со статусами
 */
class OrdersStatusResponseDto extends AbstractDto
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
                return new OrderStatusOutputDto($item);
            }, $this->orders) :
            [];
    }
}