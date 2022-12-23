<?php

namespace App\Repositories\Eloquent;

use App\Models\Company;
use App\Repositories\CompanyRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use PDF;

class CompanyRepository implements CompanyRepositoryInterface
{
    private $companyModel;

    public function __construct(Company $company)
    {
        $this->companyModel = $company;
    }

    public function getAll()
    {
        return $this->companyModel->latest()->paginate(5);
    }
    public function getById($id)
    {
        return $this->companyModel->findOrFail($id);
    }
    public function createAll(array $attrs)
    {
        $attrs['logo'] = $attrs['logo'] ? $attrs['logo']->store('company') : '';
        $query = $this->companyModel->create($attrs);
        return $query;
    }
    public function updateAll($id,$attrs)
    {
        $company = $this->getById($id);
        if($attrs['logo']){
            Storage::delete($company->logo);
            $attrs['logo'] = $attrs['logo']->store('company');
        } else {
            $attrs['logo'] = $company->logo;
        }
        $query = $company->update($attrs);
        return $query;
    }
    public function deleteById($id)
    {
        $company = $this->getById($id);
        if($company->logo){
            Storage::delete($company->logo);
        }
        $company->delete();
    }

    public function printPDF()
    {
        $companies = $this->companyModel->all();
    	$data = PDF::loadview('companies.print-pdf', ['companies' => $companies]);
        return $data;
    }
}