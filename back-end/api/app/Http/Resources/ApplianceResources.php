<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use \Illuminate\Http\Request;
class ApplianceResources extends JsonResource{
    public function toArray(Request $request) : array{
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "brand" => $this->brand,
            "voltage" => $this->voltage
        ];
    }
}