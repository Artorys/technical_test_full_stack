<?php 

namespace App\UseCases\Appliance\ReadAllAppliance;

use App\UseCases\Appliance\ReadAllAppliance\ReadAllApplianceService;
use App\Errors\ErrorHTTP;
use App\UseCases\IController;
use Illuminate\Http\JsonResponse;
use \Illuminate\Http\Request;
class ReadAllApplianceController implements IController{

    private ReadAllApplianceService $service;
    function __construct($service){
        $this->service = $service;
    }
    public function handle( Request $request, $id="") : JsonResponse{
        try{
            $appliances = $this->service->execute();
            return response()->json($appliances,200);
        }
        catch(ErrorHTTP $e){
            return response()->json($e->message,$e->status);
        }
    }
}