<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClickCounterRequest;
use App\Http\Services\ClickCounterService;
use App\Http\Services\CompanyService;
use Illuminate\Http\RedirectResponse;

class ClickCounterController extends Controller
{
    /** @var ClickCounterService  */
    private $clickCounterService;

    /** @var CompanyService  */
    private $companyService;

    /**
     * @param ClickCounterService $clickCounterService
     * @param CompanyService $companyService
     */
    public function __construct(ClickCounterService $clickCounterService, CompanyService $companyService)
    {
        $this->clickCounterService = $clickCounterService;
        $this->companyService = $companyService;
    }

    /**
     * @param ClickCounterRequest $request
     * @return RedirectResponse
     */
    public function trackingRedirect(ClickCounterRequest $request): RedirectResponse
    {
        $companyRequestData = $request->safe()->only(ClickCounterRequest::REQUEST_PARAM_KEY);

        $companyId = $companyRequestData[ClickCounterRequest::REQUEST_PARAM_KEY];
        $companyWebsite = $this->companyService->getCompanyWebsite($companyId);

        $this->clickCounterService->trackRequest($request, $companyId, $companyWebsite);
        return $this->clickCounterService->prepareRedirect($companyWebsite);
    }
}
