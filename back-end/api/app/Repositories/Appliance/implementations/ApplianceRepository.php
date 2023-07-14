<?php
namespace App\Repositories;
use App\Repositories\IRepository;
use App\Models\Appliance;
class ApplianceRepository implements IRepository
{ 
    private Appliance $entity;
    function __construct(Appliance $entity){
        $this->entity = $entity;
    }
    public function create($data){
        $appliance = Appliance::create($data);
        return $appliance;


    }
    public function readOne(string $id){

    }
    public function readAll(){

    }
    public function update(string $id,$data){

    }
    public function delete(string $id){

    }
}
