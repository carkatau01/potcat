<?php

namespace App\Http\Services;

use App\Models\Company;

class CompanyService
{
    /**
     * @param int $companyId
     * @return string
     */
    public function getCompanyWebsite(int $companyId): string
    {
        $companyData = Company::findOrFail($companyId);

        return $companyData->website ?: route('company.list');
    }
}
