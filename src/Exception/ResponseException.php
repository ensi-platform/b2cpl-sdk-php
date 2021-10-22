<?php

namespace Ensi\B2Cpl\Exception;

/**
 * Class ResponseException
 * @package Ensi\B2Cpl\Exception
 */
class ResponseException extends \RuntimeException implements ExceptionInterface
{
    /**
     * @var ExceptionReader
     */
    protected $exception;
    
    /**
     * @inheritDoc
     */
    public function __construct($message = '', $code = 0, \Exception $previous = null)
    {
        $this->exception = new ExceptionReader($message, $code);

        parent::__construct($this->exception->getMessage(), $code, $previous);
    }
    
    /**
     * @inheritDoc
     */
    public static function create($message, $code = 0, \Exception $previous = null)
    {
        return new self($message, $code, null);
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->exception->getMessage();
    }

    /**
     * @return string
     */
    public function getErrorCode()
    {
        return $this->exception->getCode();
    }
}
