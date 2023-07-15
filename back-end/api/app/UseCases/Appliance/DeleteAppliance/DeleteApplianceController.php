<?php 

namespace App\UseCases\Appliance\DeleteAppliance;

use App\Errors\ErrorHTTP;
use App\UseCases\IController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\UseCases\Appliance\DeleteAppliance\DeleteApplianceService;
use Illuminate\Http\Response;

class DeleteApplianceController implements IController{

    private DeleteApplianceService $service;
    function __construct($service){
        $this->service = $service;
    }

    public function handle(Request $request, $id = " ") : JsonResponse|Response{
        try{
   
            if(!$id){
                throw new ErrorHTTP(404,"Appliance not found.");
            }
            $appliance = $this->service->execute(id:$id);
            if($appliance == 0){
                throw new ErrorHTTP(404,"Appliance not found.");
            }
            return response()->noContent();
        }
        catch(ErrorHTTP $e){
            return response()->json($e->message,$e->status);
        }
    }
}