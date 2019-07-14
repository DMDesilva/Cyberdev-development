<?php

namespace Modules\Developer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeveloperRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'firstname' => 'required|string|max:255',
            // 'lastname' => 'required|string|max:255',
            // 'position' => 'requirumed|neric',
            // 'mobile' => 'required|string|max:255',
            // 'home' => 'required|string|max:255',
            // 'email' => 'required|email|max:255',
            // 'address' => 'required|string|max:255',
            // 'work_type' => 'required|string|max:255',
            // 'status' => 'required|boolean',
            // 'register_date'=>'required',
            // 'bitbucket_user'=>'required|numeric',
            // 'hourly_rate'=>'required|numeric',
            
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
