<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/appliance",function (Request $request){
    return response()->json("Hello World!");
});
