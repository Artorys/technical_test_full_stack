<?php

use App\Models\Appliance;
use App\Repositories\Appliance\ApplianceRepository;
use App\UseCases\Appliance\ReadOneAppliance\ReadOneApplianceController;
use App\UseCases\Appliance\ReadOneAppliance\ReadOneApplianceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/appliance/{id}",function (Request $request,$id){
    $applianceEntity = new Appliance();
    $applianceRepository = new ApplianceRepository($applianceEntity);
    $readOneApplianceService = new readOneApplianceService($applianceRepository);
    $readOneApplianceController = new ReadOneApplianceController($readOneApplianceService);

    $request->headers->set('Accept', 'application/json');
    return $readOneApplianceController->handle($request,$id);
});
