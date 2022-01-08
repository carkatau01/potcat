<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClickCounterRequest extends FormRequest
{
    /** @var string  */
    public const REQUEST_PARAM_KEY = 'company_id';

    /** @var string  */
    protected $redirectRoute = 'company.list';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company_id' => ['required', 'exists:companies,id'],
        ];
    }
}
