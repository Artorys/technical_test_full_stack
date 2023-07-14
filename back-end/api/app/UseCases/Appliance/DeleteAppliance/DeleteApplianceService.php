<?php 

namespace App\Service\Appliance;

use App\Implementations\IService;

class DeleteApplianceController implements IService{

    private $repository;
    function __construct($repository){
        $this->repository = $repository;
    }
    public function execute(){
        
    }
}