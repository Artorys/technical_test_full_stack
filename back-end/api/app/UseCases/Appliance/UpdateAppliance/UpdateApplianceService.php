<?php 

namespace App\UseCases\Appliance\UpdateAppliance;

use App\Models\Appliance;
use App\Repositories\Appliance\ApplianceRepository;
use App\UseCases\IService;

class UpdateApplianceService implements IService{

    private ApplianceRepository $repository;
    function __construct($repository){
        $this->repository = $repository;
    }
    public function execute($data=[],$id=""): Appliance|null{
        return $this->repository->update($data, $id);
    }
}