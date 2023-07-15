<?php 
namespace App\UseCases\Appliance\CreateAppliance;

use App\Models\Appliance;
use App\UseCases\IService;
use App\Repositories\Appliance\ApplianceRepository;


class CreateApplianceService implements IService{

    private ApplianceRepository $repository;
    function __construct(ApplianceRepository $repository){
        $this->repository = $repository;
    }
    public function execute($data = [],$id=""): Appliance{
        return $this->repository->create($data);
    }
}