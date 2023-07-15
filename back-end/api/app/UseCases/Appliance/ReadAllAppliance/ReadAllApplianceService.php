<?php 

namespace App\UseCases\Appliance\ReadAllAppliance;

use App\Repositories\Appliance\ApplianceRepository;
use App\UseCases\IService;
use Illuminate\Database\Eloquent\Collection;

class ReadAllApplianceService implements IService{

    private ApplianceRepository $repository;
    function __construct($repository){
        $this->repository = $repository;
    }
    public function execute($data=[],$id="") : Collection{
        return $this->repository->readAll();
    }
}