<?php

namespace App\Repositories;

use App\DTO\Appliance\ApplianceCreateDTO;
use App\DTO\Appliance\ApplianceUpdateDTO;
use App\Models\Appliance;
interface IRepository
{
    function __construct(Appliance $entity);
    public function create($data): Appliance;
    public function readOne(string $id): null|Appliance;
    public function readAll();
    public function update($data,string $id): null|Appliance;
    public function delete(string $id);
}
