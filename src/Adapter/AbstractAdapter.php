<?php

namespace Ensi\B2Cpl\Adapter;

/**
 * Class AbstractAdapter
 * @package Ensi\B2Cpl\Adapter
 */
abstract class AbstractAdapter
{
    /**
     * Url Api
     */
    const API_URL = 'https://api.b2cpl.ru/services/api_client.ashx';

    /**
     * @var string
     */
    protected $login = 'test';

    /**
     * @var string
     */
    protected $key = 'test';
    
    /**
     * @var string Custom url to be used for request
     */
    protected $customUrl = '';

    /**
     * Returns api url depends on test param
     *
     * @return string
     */
    public function getUrl(): string
    {
        if ($this->getCustomUrl()) {
            return $this->getCustomUrl();
        }
        
        return self::API_URL;
    }

    /**
     * @return boolean
     */
    public function isTest(): bool
    {
        return $this->login == 'test';
    }

    /**
     * Sets the custom url to be used for request
     * 
     * @param string $customUrl
     */
    public function setCustomUrl(string $customUrl): void
    {
        $this->customUrl = $customUrl;
    }
    
    /**
     * @return string
     */
    public function getCustomUrl(): string
    {
        return $this->customUrl;
    }
}
