<?php 

namespace App\UseCases\Appliance\CreateAppliance;

use App\UseCases\IController;
use Illuminate\Http\Request;
use App\UseCases\Appliance\CreateAppliance\CreateApplianceService;
use App\Errors\ErrorHTTP;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class CreateApplianceController implements IController{

    private CreateApplianceService $service;
    function __construct($service){
        $this->service = $service;
    }
    function createApplianceSchema(Request $request){
        return $request->validate([
            "name" => ["required"],
            "description" => ["required"],
            "brand" => ["required"],
            "voltage" => ["required"]
        ]);
    }
    public function handle(Request $request,$id = ""): JsonResponse{
        try{
            $validatedData = $this->CreateApplianceSchema($request);
            $appliance = $this->service->execute($validatedData);
            return response()->json($appliance,200);

        }
        catch(ErrorHTTP $e){
            return response()->json($e->message,$e->status);
        }
        catch(ValidationException $e){
            return response()->json($e->errors(),400);
        }
    }
}