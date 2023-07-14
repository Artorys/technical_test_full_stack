<?php

namespace App\Error;
use Exception;

class ErrorHTTP extends Exception
{

    public int $status;
    public string $message;
    function __construct(int $status,string $message){
        $this->status = $status;
        $this->message = $message;
        parent::__construct($message, $status);
    }
}