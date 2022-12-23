<?php

namespace App\Repositories\Eloquent;

use App\Models\Employee;
use App\Repositories\EmployeeRepositoryInterface;
use PDF;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    private $employeeModel;

    public function __construct(Employee $employee)
    {
        $this->employeeModel = $employee;
    }
    public function getAll()
    {
        $query = $this->employeeModel->latest()->paginate(5);
        return $query;
    }
    public function getById($id)
    {
        $query = $this->employeeModel->findOrFail($id);
        return $query;
    }
    public function createAll(array $attrs)
    {
        $attrs['company_id'] = $attrs['company'];
        $query = $this->employeeModel->create($attrs);
        return $query;
    }
    public function updateAll($id,$attrs)
    {
        $attrs['company_id'] = $attrs['company'];
        $employee = $this->getById($id)->update($attrs);
        return $employee;
    }
    public function deleteById($id)
    {
        $data = $this->getById($id);
        $data->delete();
    }
    public function printPDF()
    {
        $employees = $this->employeeModel->all();
    	$data = PDF::loadview('employees.print-pdf', ['employees' => $employees]);
        return $data;
    }
}