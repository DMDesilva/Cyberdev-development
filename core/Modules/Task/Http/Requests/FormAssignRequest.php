<?php

namespace Modules\Task\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class FormAssignRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
              'description'=> 'required',
              'user_assign'=>'required|numeric',
              'tskId'=>'',
              'tskdeadline'=>'',
              
                
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

