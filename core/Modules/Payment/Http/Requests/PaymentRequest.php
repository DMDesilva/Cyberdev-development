<?php

namespace Modules\Payment\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           'client' => 'required|numeric',
           // 'cc_client' => 'nullable|numeric',
           'service' => 'required|numeric',
           'source' => 'required|string|max:255',
           'amount' => 'required|numeric',
           'duration' => 'required|numeric',
           'start_date' => 'required|date',
           'repeat' => 'nullable',
           'repeat_type' => 'required_if:repeat,1',
           'custom_duration' => 'required_if:repeat_type,Custom',
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
