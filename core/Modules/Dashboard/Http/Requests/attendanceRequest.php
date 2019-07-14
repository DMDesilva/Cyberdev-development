<?php

namespace Modules\DashBoard\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;



class attendanceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'id'=>'reqired',
            // 'user_id'=>'reqired',
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

