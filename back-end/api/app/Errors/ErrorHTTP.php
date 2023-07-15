<?php

namespace App\Errors;
use Exception;

class ErrorHTTP extends Exception
{

    public int $status;
    public $message;
    function __construct(int $status,$message){
        $this->status = $status;
        $this->message = ["message"=> $message];
    }
} 