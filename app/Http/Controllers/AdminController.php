<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;



class AdminController extends Controller

{

     

    public function __construct()

    {

        $this->middleware('auth:admin');


    }

    public function index()

    {   
         
        $data = [];

        $data['title'] = 'Dashboard';

        $data['name'] = \Auth::guard('admin')->user()->name;

         

        return view('admin.home',compact('data'));

    }

}

