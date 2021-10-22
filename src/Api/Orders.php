<?php

namespace Ensi\B2Cpl\Api;

use Ensi\B2Cpl\Dto\Request\OrderCancelRequestDto;
use Ensi\B2Cpl\Dto\Request\OrdersRequestDto;
use Ensi\B2Cpl\Dto\Request\OrdersStatusRequestDto;
use Ensi\B2Cpl\Dto\Request\StickerRequestDto;
use Ensi\B2Cpl\Dto\Response\OrderCancelResponseDto;
use Ensi\B2Cpl\Dto\Response\OrdersResponseDto;
use Ensi\B2Cpl\Dto\Response\OrdersStatusResponseDto;
use Ensi\B2Cpl\Dto\Response\StickerResponseDto;

/**
 * Class Orders
 * @package Ensi\B2Cpl\Api
 */
class Orders extends AbstractApi
{
    /**
     * Создать заказы на доставку
     * @param OrdersRequestDto $request
     * @return OrdersResponseDto
     */
    public function create(OrdersRequestDto $request): OrdersResponseDto
    {
        $request->flag_update = 0;

        return $this->upsert($request);
    }
    
    /**
     * Обновить заказы на доставку
     * @param OrdersRequestDto $request
     * @return OrdersResponseDto
     */
    public function update(OrdersRequestDto $request): OrdersResponseDto
    {
        $request->flag_update = 1;

        return $this->upsert($request);
    }
    
    /**
     * Отменить заказ на доставку
     * @param OrderCancelRequestDto $request
     * @return OrderCancelResponseDto
     */
    public function cancel(OrderCancelRequestDto $request): OrderCancelResponseDto
    {
        $resultJson = $this->adapter->post('order_return', [], $request->toArray());
        $result     = json_decode($resultJson, true);
    
        return new OrderCancelResponseDto($result);
    }
    
    /**
     * Получить статус заказов на доставку
     * @param OrdersStatusRequestDto $request
     * @return OrdersStatusResponseDto
     */
    public function status(OrdersStatusRequestDto $request): OrdersStatusResponseDto
    {
        $resultJson = $this->adapter->post('order_status', [], $request->toArray());
        $result     = json_decode($resultJson, true);
    
        return new OrdersStatusResponseDto($result);
    }

    /**
     * Получить штрихкоды для заказов на доставку и их мест
     * @param  StickerRequestDto  $request
     * @return StickerResponseDto
     */
    public function barcodes(StickerRequestDto $request): StickerResponseDto
    {
        $resultJson = $this->adapter->post('sticker', [], $request->toArray());
        $result     = json_decode($resultJson, true);

        return new StickerResponseDto($result);
    }
    
    /**
     * Создать/обновить заказы на доставку
     * @param  OrdersRequestDto  $request
     * @return OrdersResponseDto
     */
    protected function upsert(OrdersRequestDto $request): OrdersResponseDto
    {
        $resultJson = $this->adapter->post('order', [], $request->toArray());
        $result     = json_decode($resultJson, true);
    
        return new OrdersResponseDto($result);
    }
}
