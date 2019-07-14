<?php

namespace Modules\Task\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class EditTaskRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'=>'required',
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
			'bitbucket_repo_id'=>'',          
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

