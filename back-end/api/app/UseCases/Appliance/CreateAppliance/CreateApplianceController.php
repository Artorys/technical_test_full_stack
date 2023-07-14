<?php 

namespace App\Controller\Appliance;

use App\Implementations\IController;
use Illuminate\Http\Request;
use App\Service\Appliance\CreateApplianceService;
use App\Error\ErrorHTTP;
use Illuminate\Http\JsonResponse;

use function App\Schema\Appliance\CreateApplianceSchema;

class CreateApplianceController implements IController{

    private CreateApplianceService $service;
    function __construct($service){
        $this->service = $service;
    }
    public function handle(Request $request) : JsonResponse{
        try{
            $validatedData = CreateApplianceSchema($request);
            $appliance = $this->service->execute($validatedData);
            return response(status:200)->json($appliance);

        }
        catch(ErrorHTTP $e){
            return response(status:$e->status)->json($e->message);
        }
    }
}