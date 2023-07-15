<?php

namespace App\UseCases\Appliance\ReadOneAppliance;
use App\Errors\ErrorHTTP;
use App\UseCases\Appliance\ReadOneAppliance\ReadOneApplianceService;
use App\UseCases\IController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReadOneApplianceController implements IController
{
    private ReadOneApplianceService $service;

    public function __construct($service)
    {
        $this->service = $service;
    }

    public function handle(Request $request, $id = ""): JsonResponse 
    {
        try {
            if (!$id) {
                throw new ErrorHTTP(404, "Appliance not found.");
            }
            $appliance = $this->service->execute(id:$id);
            if(!$appliance){
                throw new ErrorHTTP(404, "Appliance not found.");
            }
            return response()->json($appliance, 200);
        } catch (ErrorHTTP $e) {
            return response()->json($e->message, $e->status);
        }
    }
}
