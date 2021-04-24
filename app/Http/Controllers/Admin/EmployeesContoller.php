<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Companies;
use App\Models\Employees;
use App\Http\Requests\EmployeesRequest;
class EmployeesContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
     
    public function index()
    {
        $data = [];
        $data['pageTitle'] ="Employees";
        $data['employees'] =Employees::with('company')->orderby('id','desc')->paginate(10); 
        return view('Admin.Employees.index',compact('data')); 
    }

     
    public function create()
    {
        $data = [];
        $data['pageTitle'] ="Employees";
        $data['action']="create";
        $data['companylist']=Companies::pluck('name','id');
        
        $data['selectedCompany']='';
        return view('Admin.Employees.manage',compact('data'));
    }

     
    public function store(EmployeesRequest $request)
    {
         
        $employees = new Employees();
        $employees->first_name = $request->first_name;
        $employees->last_name = $request->last_name;
         
        $employees->company_id = $request->company_id;
        $employees->email = $request->email;
        $employees->phone = $request->phone;
        $result = $employees->save();
        if($result==1)
        {
            return redirect()->route('employees.index')->with('success','Employee Created Successfully');
        } else {
            return redirect()->back()->with('error','Something Went Wrong Try Again');
        }
    }

     
    public function show($id)
    {
         $data = [];
        $data['pageTitle']= 'Employees Details';
        $data['employees'] = Employees::find($id);
        return view('Admin.Employees.show',compact('data'));
    }

     
    public function edit($id)
    {
        $data = [];
        $data['pageTitle']="Edit Employees";
        $data['action']="edit";
        $data['employees'] = Employees::find($id);
         $data['companylist']=Companies::pluck('name','id');
        
        $data['selectedCompany']=$data['employees']->company_id; 

        return view('Admin.Employees.manage',compact('data'));
    }

     
    public function update(EmployeesRequest $request, $id)
    {
         $updateArray = [
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'company_id' => $request->company_id,
                    'email' => $request->email,
                    'phone' => $request->phone
                        ];
        $result = Employees::where('id',$id)->update($updateArray);
        if($result==1)
        {
            return redirect()->route('employees.index')->with('success','Employee Details Updated Successfully');
        } else {
            return redirect()->back()->with('error','Something Went Wrong Try Again');
        }
    }

     
    public function destroy($id)
    {
        $employees = Employees::find($id);
        $result = $employees->delete();
        if($result==1){
            $message = 'Employees Successfully Deleted';
            return redirect()->route('employees.index')->with( [ 'success' => $message ] );
        } else {
            $message = 'Oops Something went wrong try again';
            return redirect()->route('employees.index')->with( [ 'error' => $message ] );
        }
    }
}
