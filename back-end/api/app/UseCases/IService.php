<?php
namespace App\UseCases;

use App\Models\Appliance;
use App\Repositories\Appliance\ApplianceRepository;

interface IService{

    function __construct(ApplianceRepository $repository);
    public function execute($data = [], string $id = "");

}