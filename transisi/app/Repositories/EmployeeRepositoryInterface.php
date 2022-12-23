<?php

namespace App\Repositories;

interface EmployeeRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function createAll(array $attrs);
    public function updateAll($id,$attrs);
    public function deleteById($id);
    public function printPDF();
}