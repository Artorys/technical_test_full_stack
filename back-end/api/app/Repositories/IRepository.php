<?php

namespace App\Repositories;
interface IRepository
{
    function __construct($entity);
    public function create($data);
    public function readOne(string $id);
    public function readAll();
    public function update(string $id, $data);
    public function delete(string $id);
}
