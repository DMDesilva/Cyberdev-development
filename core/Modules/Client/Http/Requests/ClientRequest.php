<?php

namespace Modules\Client\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
             'full_name' => 'required|string|max:255',
             'good_name' => 'required',
             'contact_no' => 'required',
             'email_address' => 'required|email',
              'currency' => 'required|string|max:10'


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
