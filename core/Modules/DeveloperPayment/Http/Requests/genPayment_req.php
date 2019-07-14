<?php

namespace Modules\DeveloperPayment\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class genPayment_req extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
              'developers'=> '',
              'reason_value'=>'',
              'other_reson'=>'',
              'other_reson'=>'',
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