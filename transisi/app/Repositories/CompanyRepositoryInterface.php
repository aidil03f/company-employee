<?php

namespace App\Repositories;

interface CompanyRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function createAll(array $attrs);
    public function updateAll($id,$attrs);
    public function deleteById($id);
    public function printPDF();
}