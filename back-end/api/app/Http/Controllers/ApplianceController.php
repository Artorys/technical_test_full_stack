<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateApplianceFormRequest;
use App\Http\Requests\UpdateApplianceFormRequest;
use App\Http\Resources\ApplianceResources;
use App\Models\Appliance;

class ApplianceController extends Controller
{
    public function create(CreateApplianceFormRequest $request){
        return Appliance::create($request->only(["name","description","brand","voltage"]));
    }
    public function delete(Request $request,int $appliance){
        $finded = Appliance::find($appliance);
        if(is_null($finded)){
            return response()->json(["message" => "Appliance not found."],404);
        }
        $finded->delete();
        return response()->noContent();
    }
    public function listAll(Request $request){
        $appliances = Appliance::paginate();
        return ApplianceResources::collection($appliances);
    }
    public function find(Request $request,int $appliance){
        $finded = Appliance::find($appliance);
        if(is_null($finded)){
            return response()->json(["message" => "Appliance not found."],404);
        }
        return $finded;
    }
    public function update(UpdateApplianceFormRequest $request,int $appliance){
        $finded = Appliance::find($appliance);
        if(is_null($finded )){
            return response()->json(["message" => "Appliance not found."],404);
        }
        $finded->name = $request->validated("name");
        $finded->description = $request->validated("description");
        $finded->brand = $request->validated("brand");
        $finded->voltage = $request->validated("voltage");
        $finded->save();
        return response()->json($finded,200);
    }
}

