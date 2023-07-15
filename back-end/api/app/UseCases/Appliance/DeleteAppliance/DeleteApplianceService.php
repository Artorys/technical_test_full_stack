<?php 

namespace App\UseCases\Appliance\DeleteAppliance;

use App\Models\Appliance;
use App\Repositories\Appliance\ApplianceRepository;
use App\UseCases\IService;

class DeleteApplianceService implements IService{

    private ApplianceRepository $repository;
    function __construct($repository){
        $this->repository = $repository;
    }
    public function execute($data = [],$id="") : int{
        return $this->repository->delete($id);
    }
}