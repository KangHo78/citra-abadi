<?php

namespace App\Exceptions;

use Exception;

class CustomArrayException extends Exception
{
    protected $data;

    public function __construct($data = [], $message = "", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }
}
