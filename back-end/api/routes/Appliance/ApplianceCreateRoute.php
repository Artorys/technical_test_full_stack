<?php

use App\Models\Appliance;
use App\Repositories\Appliance\ApplianceRepository;
use App\UseCases\Appliance\CreateAppliance\CreateApplianceController;
use App\UseCases\Appliance\CreateAppliance\CreateApplianceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post("/appliance",function (Request $request){
    $applianceEntity = new Appliance();
    $applianceRepository = new ApplianceRepository($applianceEntity);
    $createApplianceService = new CreateApplianceService($applianceRepository);
    $createApplianceController = new CreateApplianceController($createApplianceService);
    
    $request->headers->set('Accept', 'application/json');
    return $createApplianceController->handle($request);
});
