<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(5);
        return view('company.index')->with('companies', $companies);
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('company.show')->with('company', $company);
    }
}
