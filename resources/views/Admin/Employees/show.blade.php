@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row"> <div class="col-md-6"><a href="{{route('companies.index')}}" class="btn btn-sm btn-success">Back</a></div><div class="col-md-6"><a href="{{route('admin.home')}}" class="btn btn-sm btn-success">Home</a></div></div>
            <div class="card">
                 

                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">First Name</th>
                      <th scope="col">Last Name</th>
                      <th scope="col">Company</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                    @if($data['employees']!="")
                   
                    <tr>
                      <th scope="row"> </th>
                      <td>{{$data['employees']->first_name}}</td>
                      <td>{{$data['employees']->last_name}}</td>
                      <td>@if($data['employees']->company!=""){{$data['employees']->company->name}} @endif</td>
                      <td>{{$data['employees']->email}}</td>
                      <td>{{$data['employees']->phone}}</td>
                      


                    </tr>
                     
                    @endif
                     
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>

function ConfirmDelete(){

  if (confirm("Are You Sure Want To Delete ?")){

        return true;

  }

  else {

      

     return false;

  }

}
</script>
@endsection
