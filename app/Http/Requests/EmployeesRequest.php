<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->request->get('id') ?  $this->request->get('id') : '';
        
         
        if($id!=""){
             
           return [
               'first_name'=>'required|unique:employees,first_name,'.$id.',id',
               'last_name'  => 'required',    
            ]; 
        } else {

           return [
                
               'first_name'=>'required|unique:employees,first_name'.$id,
               'last_name'  => 'required',  
                
            ];

        } 
    }

    public function messages()
    {
        return [
            
            'first_name.required' => 'First Name is required!',
            'last_name.required' => 'Last Name is required!',
             
        ];
    }
}
