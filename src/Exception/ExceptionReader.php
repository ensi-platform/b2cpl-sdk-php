<?php

namespace Ensi\B2Cpl\Exception;

/**
 * Class ExceptionReader
 * @package Ensi\B2Cpl\Exception
 */
class ExceptionReader
{
    /**
     * @var string Error message
     */
    protected $message;
    
    /**
     * @var int Exception error code
     */
    protected $code;
    
    /**
     * Ошибки в формате Apiship
     *
     * @param string $content
     * @param int    $code (optional)
     */
    public function __construct($content, $code = 0)
    {
        $content           = json_decode($content, true);
        $this->message     = !empty($content['message']) ? $content['message'] : 'Request not processed.';
        
        $this->code = $code;
    }
    
    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
    
    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}
