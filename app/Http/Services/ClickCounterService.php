<?php

namespace App\Http\Services;

use App\Http\Requests\ClickCounterRequest;
use App\Models\ClickCounter;
use Illuminate\Support\Facades\Redirect;
use \Illuminate\Http\RedirectResponse;

class ClickCounterService
{
    /**
     * @param ClickCounterRequest $request
     * @param int $companyId
     * @param string $companyWebsite
     */
    public function trackRequest(ClickCounterRequest $request, int $companyId, string $companyWebsite = '')
    {
        $requestData = $this->prepareRequestData($request);
        $requestData['company_id'] = $companyId;
        $requestData['website'] = $companyWebsite;

        ClickCounter::query()->create($requestData);
    }

    /**
     * @param ClickCounterRequest $request
     * @return array
     */
    private function prepareRequestData(ClickCounterRequest $request):array
    {
        return [
            'ip' => $request->ip(),
            'language' => $request->getPreferredLanguage(),
            'user_agent' => $request->userAgent(),
            'cookie' => json_encode($request->cookie()),
        ];
    }

    /**
     * @param string $companyWebsite
     * @return RedirectResponse
     */
    public function prepareRedirect(string $companyWebsite): RedirectResponse
    {
        return Redirect::away($companyWebsite);
    }
}
