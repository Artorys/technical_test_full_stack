<?php 

namespace App\UseCases\Appliance\ReadOneAppliance;

use App\Models\Appliance;
use App\Repositories\Appliance\ApplianceRepository;
use App\UseCases\IService;

class ReadOneApplianceService implements IService{

    private ApplianceRepository $repository;
    function __construct($repository){
        $this->repository = $repository;
    }
    public function execute($data=[],$id=""): Appliance|null{
        return $this->repository->readOne($id);
    }
}