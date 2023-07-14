<?php
namespace App\Schema\Appliance;

use Illuminate\Http\Request;

function CreateApplianceSchema(Request $request){
    return $request->validate([
        "description" => ['required'],
        "brand" => ['required'],
        "voltage" => ['required']
    ]);
}