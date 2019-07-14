<?php

namespace Modules\Task\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class TaskRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
			'title'=>'required',
			'description'=>'',
			'reported_by'=>'',
			'type'=>'required',
			'status'=>'required',
			'Resource_url'=> '',
			'priority'=>'required',
			'bday'=>'required',
			'usr_time'=>'required',
			'hours'=>'required',
			'bitbucket_repo_id'=>'required',          
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

