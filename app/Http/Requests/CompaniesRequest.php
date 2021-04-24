<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompaniesRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

     
    public function rules()
    {
        $id = $this->request->get('id') ?  $this->request->get('id') : '';
        
         
        if($id!=""){
             
           return [
               'name'=>'required|unique:companies,name,'.$id.',id',
               'logo'  => 'dimensions:min_width=100,min_height=100',    
            ]; 
        } else {

           return [
                
               'name'=>'required|unique:companies,name'.$id,
               'logo'  => 'dimensions:min_width=100,min_height=100',  
                
            ];

        } 
    }

    public function messages()
    {
        return [
            
            'name.required' => 'Company Name is required!',
            'logo.required' => 'Logo Must be of 100 x 100 and it is required!',
             
        ];
    }
}
