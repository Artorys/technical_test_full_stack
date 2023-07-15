<?php

use App\Models\Appliance;
use App\Repositories\Appliance\ApplianceRepository;
use App\UseCases\Appliance\DeleteAppliance\DeleteApplianceController;
use App\UseCases\Appliance\DeleteAppliance\DeleteApplianceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::delete("/appliance/{id}",function (Request $request,$id){
    $applianceEntity = new Appliance();
    $applianceRepository = new ApplianceRepository($applianceEntity);
    $deleteApplianceService = new DeleteApplianceService($applianceRepository);
    $deleteApplianceController = new DeleteApplianceController($deleteApplianceService);

    $request->headers->set('Accept', 'application/json');
    return $deleteApplianceController->handle($request, $id);
});
