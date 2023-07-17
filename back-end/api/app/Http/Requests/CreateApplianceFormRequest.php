<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class CreateApplianceFormRequest extends FormRequest{
    public function rules() : array
    {
        return [
            "name" => ["required","string"],
            "description" => ["nullable","string"],
            "brand" => ["required","string"],
            "voltage" => ["required","string"]
        ];
    }
    public function authorize(): bool{
        return true;
    }
}