<?php

namespace App\UseCases\Appliance\UpdateAppliance;
use App\Errors\ErrorHTTP;
use App\UseCases\IController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\UseCases\Appliance\UpdateAppliance\UpdateApplianceService;

class UpdateApplianceController implements IController
{
    private UpdateApplianceService $service;

    public function __construct($service)
    {
        $this->service = $service;
    }

    public function handle(Request $request, $id = ""): JsonResponse
    {
        try {
            $validateData = $this->updateApplianceSchema($request);
            $appliance = $this->service->execute($validateData, $id);
            if (!$appliance) {
                throw new ErrorHTTP(404, "Appliance not found.");
            }
            return response()->json($appliance, 200);
        } catch (ErrorHTTP $e) {
            return response()->json($e->message, $e->status);
        }
    }

    public function updateApplianceSchema(Request $request)
    {
        return $request->validate([
            "name" => ["string", "nullable"],
            "description" => ["string", "nullable"],
            "brand" => ["string", "nullable"],
            "voltage" => ["string", "nullable"]
        ]);
    }
}
