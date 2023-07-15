<?php
namespace App\UseCases;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

interface IController{
    
    function __construct($service);
    public function handle(Request $request,$id=""): JsonResponse|Response;
    
}