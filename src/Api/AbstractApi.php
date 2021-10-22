<?php

namespace Ensi\B2Cpl\Api;

use Ensi\B2Cpl\Adapter\AdapterInterface;

/**
 * Class AbstractApi
 * @package Ensi\B2Cpl\Api
 */
abstract class AbstractApi
{
    /**
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * @param AdapterInterface $adapter
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }
}
