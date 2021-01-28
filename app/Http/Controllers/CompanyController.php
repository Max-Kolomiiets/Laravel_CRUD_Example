<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(7);
        return view('admin-cms.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-cms/companies/form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {

        $pathToImage = $request->file('logo')->store('companies');
        $data = $request->all();
        $data['logo'] = $pathToImage;

        Company::create($data);

        return redirect()->route('companies.index')->withSuccess("Company {$data['name']} was created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('admin-cms/companies/show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('admin-cms/companies/form', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $data = [];
       if (!empty($request['logo'])) {
            $pathToImage = $request->file('logo')->store('companies');
            $data = $request->all();
            $data['logo'] = $pathToImage;

            $company->update($data);
       } else {
            $data = $request->all();
            $data['logo'] = $company->logo;

            $company->update($data);
       }

        
        return redirect()->route('companies.index')->withSuccess("Updated company: $company->name");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->withDanger("Company: $company->name was removed!");
    }
}
