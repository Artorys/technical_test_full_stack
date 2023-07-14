<?php 
namespace App\Service\Appliance;
use App\Implementations\IService;
use App\Repositories\ApplianceRepository;


class CreateApplianceService implements IService{

    private ApplianceRepository $repository;
    function __construct(ApplianceRepository $repository){
        $this->repository = $repository;
    }
    public function execute($data){
        return $this->repository->create($data);
    }
}