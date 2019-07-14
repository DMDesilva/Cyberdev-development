<?php

namespace Modules\Service\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           'service_name' => 'required|string|max:255',
           'service_type' => 'required|in:Domain,Hosting,Development,Consultation',
           'due_percentage' => 'required|numeric',
           'description' => 'required|max:255',
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
