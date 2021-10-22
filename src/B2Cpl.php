<?php

namespace Ensi\B2Cpl;

use Ensi\B2Cpl\Adapter\AdapterInterface;
use Ensi\B2Cpl\Api\Calculator;
use Ensi\B2Cpl\Api\CourierCall;
use Ensi\B2Cpl\Api\Orders;

/**
 * Class B2Cpl
 * @package Ensi\B2Cpl
 */
class B2Cpl
{
    /**
     * @var AdapterInterface
     */
    public $adapter;

    /**
     * @param AdapterInterface $adapter
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return Calculator
     */
    public function calculator(): Calculator
    {
        return new Calculator($this->adapter);
    }

    /**
     * @return Orders
     */
    public function orders(): Orders
    {
        return new Orders($this->adapter);
    }

    /**
     * @return CourierCall
     */
    public function courierCall(): CourierCall
    {
        return new CourierCall($this->adapter);
    }
}
