<?php

namespace Modules\Developermail\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Developermailrequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'devgroup'=>'nullable',
            'developers'=>'nullable',
            'mailtype'=>'required|numeric',
            'duration' => 'required|numeric',
            'start_date' => 'required|date',
            'repeat' => 'nullable',
            'repeat_type' => 'required_if:repeat,1',
            'custom_duration'=>'nullable',
            'status'=>'required|boolean'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
