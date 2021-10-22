<?php

namespace Ensi\B2Cpl\Adapter;

use Ensi\B2Cpl\Exception\ExceptionInterface;

/**
 * Interface AdapterInterface
 * @package Ensi\B2Cpl\Adapter
 */
interface AdapterInterface
{
    /**
     * Sets the custom url to be used for request
     *
     * @param string $customUrl
     */
    public function setCustomUrl(string $customUrl): void;
    
    /**
     * @param string $func
     * @param array  $headers (optional)
     * @param array  $query   (optional)
     * @return string
     * @throws \RuntimeException|ExceptionInterface
     */
    public function get(string $func, array $headers = [], array $query = []);

    /**
     * @param string $func
     * @param array  $headers (optional)
     * @throws \RuntimeException|ExceptionInterface
     */
    public function delete(string $func, array $headers = []);

    /**
     * @param string $func
     * @param array  $headers (optional)
     * @param array $content (optional)
     * @return string
     * @throws \RuntimeException|ExceptionInterface
     */
    public function put(string $func, array $headers = [], $content = []);

    /**
     * @param string $func
     * @param array  $headers (optional)
     * @param array $content (optional)
     * @return string
     * @throws \RuntimeException|ExceptionInterface
     */
    public function post(string $func, array $headers = [], $content = []);
}
