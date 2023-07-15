<?php

use App\Models\Appliance;
use App\Repositories\Appliance\ApplianceRepository;
use App\UseCases\Appliance\ReadAllAppliance\ReadAllApplianceController;
use App\UseCases\Appliance\ReadAllAppliance\ReadAllApplianceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/appliance",function (Request $request){
    $applianceEntity = new Appliance();
    $applianceRepository = new ApplianceRepository($applianceEntity);
    $readAllApplianceService = new readAllApplianceService($applianceRepository);
    $readAllApplianceController = new readAllApplianceController($readAllApplianceService);

    $request->headers->set('Accept', 'application/json');
    return $readAllApplianceController->handle($request);
});
