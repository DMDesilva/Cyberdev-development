<?php

namespace Modules\Project\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'clients'=>'required|array|min:1',
            'domain' => 'required|string|max:255',
            'approved_date' => 'required|date',
            'dev_start_date' => 'required|date',
            'amount' => 'required|numeric',
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
