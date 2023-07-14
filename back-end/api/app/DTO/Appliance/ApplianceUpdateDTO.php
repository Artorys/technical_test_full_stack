<?php

namespace App\DTO\Appliance;

class ApplianceUpdateDTO{

    public string $name;
    public string|null $description;
    public string|null $voltage;
    public string|null $brand;
}