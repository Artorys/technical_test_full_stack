<?php

use App\Http\Controllers\ApplianceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix("appliance")->group(function (){
    Route::get("/",[ApplianceController::class,"listAll"]);
    Route::get("/{appliance}",[ApplianceController::class,"find"]);
    Route::post("/",[ApplianceController::class,"create"]);
    Route::put("/{appliance}",[ApplianceController::class,"update"]);
    Route::delete("/{appliance}",[ApplianceController::class,"delete"]);
});
