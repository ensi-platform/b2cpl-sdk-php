<?php

namespace Ensi\B2Cpl\Api;

use Ensi\B2Cpl\Adapter\AdapterInterface;
use Ensi\B2Cpl\Dto\Request\CourierCallCancelRequestDto;
use Ensi\B2Cpl\Dto\Request\CourierCallRequestDto;
use Ensi\B2Cpl\Dto\Response\CourierCallCancelResponseDto;
use Ensi\B2Cpl\Dto\Response\CourierCallResponseDto;

/**
 * Class CourierCall
 * @package Ensi\B2Cpl\Api
 */
class CourierCall extends AbstractApi
{
    /**
     * Url Api
     */
    const API_URL = 'http://is.b2cpl.ru/portal/client_api.ashx';
    
    /**
     * CourierCall constructor.
     * @param  AdapterInterface  $adapter
     */
    public function __construct(AdapterInterface $adapter)
    {
        $adapter->setCustomUrl(static::API_URL);
        parent::__construct($adapter);
    }
    
    /**
     * Создать заказы на доставку
     * @param CourierCallRequestDto $request
     * @return CourierCallResponseDto
     */
    public function create(CourierCallRequestDto $request): CourierCallResponseDto
    {
        $resultJson = $this->adapter->get('transport_call', [], $request->toArray());
        $result     = json_decode($resultJson, true);
    
        return new CourierCallResponseDto($result);
    }
    
    /**
     * @param CourierCallCancelRequestDto $request
     * @return CourierCallCancelResponseDto
     */
    public function cancel(CourierCallCancelRequestDto $request): CourierCallCancelResponseDto
    {
        $resultJson = $this->adapter->get('transport_cancel', [], $request->toArray());
        $result     = json_decode($resultJson, true);
    
        return new CourierCallCancelResponseDto($result);
    }
}
