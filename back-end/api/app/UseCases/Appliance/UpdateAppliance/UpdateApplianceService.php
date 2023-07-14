<?php 

namespace App\Service\Appliance;

use App\Implementations\IService;

class UpdateApplianceService implements IService{

    private $repository;
    function __construct($repository){
        $this->repository = $repository;
    }
    public function execute(){
        
    }
}