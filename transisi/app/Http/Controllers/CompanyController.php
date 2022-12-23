<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Repositories\CompanyRepositoryInterface;

class CompanyController extends Controller
{
    private $companyRepository;

    public function __construct(CompanyRepositoryInterface $company)
    {
        $this->companyRepository = $company;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->expectsJson()) {
            $companies = $this->companyRepository->getAll();
            return response()->json($companies);
        }
        $companies = $this->companyRepository->getAll();
        return view('companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $attrs = $request->all();
        $this->companyRepository->createAll($attrs);
        return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = $this->companyRepository->getById($id);
        return view('companies.edit',['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $attrs = $request->all();
        $this->companyRepository->updateAll($id,$attrs);
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->companyRepository->deleteById($id);
        return redirect()->back();
    }
    public function printPDF()
    {
        return $this->companyRepository->printPDF()->download('companies.pdf');
    }
}
