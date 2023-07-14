<?php 

namespace App\Controller\Appliance;

use App\Implementations\IController;

class UpdateApplianceController implements IController{

    private $service;
    function __construct($service){
        $this->service = $service;
    }
    public function handle(){
        
    }
}