<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Companies;
use App\Models\Employees;
use App\Http\Requests\CompaniesRequest;
use Storage;
class CompaniesContoller extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        $data = [];
        $data['pageTitle'] ="Companies";
        $data['companies'] =Companies::orderby('id','desc')->paginate(10); 
         
       return view('Admin.Companies.index',compact('data')); 
    }

    
    public function create()
    {   
        $data = [];
        $data['pageTitle'] ="Companies";
        $data['action']="create";
        return view('Admin.Companies.manage',compact('data'));
    }

     
    public function store(CompaniesRequest $request)
    {

        if ($request->hasFile('logo')) {
             $logoPath = $request->file('logo');
             $logoName = time() . '.' . $logoPath->getClientOriginalExtension();

             $path = $request->file('logo')->storeAs('uploads/logo/'.\Auth::user()->id, $logoName, 'public');
             
            
        } else {
            $path = '';
        }

        $companies = new Companies();
        $companies->name = $request->name;
        $companies->email = $request->email;
         
        $companies->logo = '/storage/'.$path;
        $companies->website = $request->website;
        $result = $companies->save();
        if($result==1)
        {
            return redirect()->route('companies.index')->with('success','Company Created Successfully');
        } else {
            return redirect()->back()->with('error','Something Went Wrong Try Again');
        }
        
    }

     
    public function show($id)
    {
        $data = [];
        $data['pageTitle']= 'Companies Details';
        $data['companies'] = Companies::find($id);
        return view('Admin.Companies.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   

        $data = [];
        $data['pageTitle']="Edit Companies";
        $data['action']="edit";
        $data['companies'] = Companies::find($id); 

        return view('Admin.Companies.manage',compact('data'));
        
    }

     
    public function update(CompaniesRequest $request, $id)
    {   
        $findCompany = Companies::find($id);
        if ($request->hasFile('logo')) {

            $directoryPath = url($findCompany->logo);
            
            if(\File::exists($directoryPath))
            {   dd('test');
                \File::delete($directoryPath);
            }
            
             $logoPath = $request->file('logo');
             $logoName = time() . '.' . $logoPath->getClientOriginalExtension();

             $path = $request->file('logo')->storeAs('uploads/logo/'.\Auth::user()->id, $logoName, 'public');
             
            
        } else {
            $path = $findCompany->logo;
        }

        $updateArray = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'logo' => '/storage/'.$path,
                    'website' => $request->website
                        ];
        $result = Companies::where('id',$id)->update($updateArray);
        if($result==1)
        {
            return redirect()->route('companies.index')->with('success','Company Updated Successfully');
        } else {
            return redirect()->back()->with('error','Something Went Wrong Try Again');
        }



          
    }

     
    public function destroy($id)
    {
            $companies = Employees::where('company_id',$id)->get()->count();
            if($companies>0)
            {
                $message = 'You Cannot Delete These Record As Employees are added for these compnay';
                    return redirect()->route('companies.index')->with( [ 'error' => $message ] );
            }   else {
                $companies = Companies::find($id);
                $result = $companies->delete();
                if($result==1){
                    $message = 'Companies Successfully Deleted';
                    return redirect()->route('companies.index')->with( [ 'success' => $message ] );
                } else {
                    $message = 'Oops Something went wrong try again';
                    return redirect()->route('companies.index')->with( [ 'error' => $message ] );
                }
            } 
    }
}
