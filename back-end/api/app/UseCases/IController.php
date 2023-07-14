<?php
namespace App\Implementations;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface IController{
    
    function __construct($service);
    public function handle(Request $request) : JsonResponse;
    
}