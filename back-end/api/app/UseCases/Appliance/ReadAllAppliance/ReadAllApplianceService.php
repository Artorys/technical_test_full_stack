<?php 

namespace App\Service\Appliance;

use App\Implementations\IService;

class ReadAllApplianceService implements IService{

    private $repository;
    function __construct($repository){
        $this->repository = $repository;
    }
    public function execute(){
        
    }
}