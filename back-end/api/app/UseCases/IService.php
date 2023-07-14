<?php
namespace App\Implementations;

interface IService{

    function __construct($repository);
    public function execute($data);

}