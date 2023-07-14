<?php
namespace App\DTO\Appliance;
class ApplianceCreateDTO{
    public string $name;
    public string $description;
    public string $voltage;
    public string $brand;

    function __construct($name,$description,$voltage,$brand){
        $this->name = $name;
        $this->description = $description;
        $this->voltage = $voltage;
        $this->brand = $brand;
    }
}