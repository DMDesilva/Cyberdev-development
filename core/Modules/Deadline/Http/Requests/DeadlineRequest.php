<?php

namespace Modules\Deadline\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeadlineRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            
         
                  
            'task_id' =>'required|numeric',   
            'task_url' => array("required", "regex:".$regex) ,
            'assign_hourse' => 'required|numeric',
           
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
