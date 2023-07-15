<?php

use App\Models\Appliance;
use App\Repositories\Appliance\ApplianceRepository;
use App\UseCases\Appliance\UpdateAppliance\UpdateApplianceService;
use App\UseCases\Appliance\UpdateAppliance\UpdateApplianceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::patch("/appliance/{id}",function (Request $request,$id){
    $applianceEntity = new Appliance();
    $applianceRepository = new ApplianceRepository($applianceEntity);
    $updateApplianceService = new UpdateApplianceService($applianceRepository);
    $updateApplianceController = new UpdateApplianceController($updateApplianceService);

    $request->headers->set('Accept', 'application/json');
    return $updateApplianceController->handle($request, $id);
});
