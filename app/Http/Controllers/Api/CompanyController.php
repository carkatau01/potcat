<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;

class CompanyController extends Controller
{

    public function index()
    {
        return CompanyResource::collection(Company::all());
    }

    public function store(CompanyRequest $companyRequest)
    {
        $company = Company::create($companyRequest->validated());
        return new CompanyResource($company);
    }

    public function show(Company $company)
    {
        return new CompanyResource($company);
    }

    public function update(CompanyRequest $companyRequest, Company $company)
    {
        $company->update($companyRequest->validated());

        return new CompanyResource($company);
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return response()->noContent();
    }
}
