@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row"> <div class="col-md-6"><a href="{{route('employees.create')}}" class="btn btn-sm btn-success">Add New Record</a></div><div class="col-md-6"><a href="{{route('admin.home')}}" class="btn btn-sm btn-success">Home</a></div></div>
            <div class="card">

              
                 @if(session()->has('message'))
                  <div class="alert alert-success">
                      {{ session()->get('message') }}
                  </div>
              @endif

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

                    @if($data['employees']->total()>0)
                    @foreach($data['employees']  as $key=>$employees)
                    <tr>
                      <th scope="row">{{$key+1}}</th>
                      <td>{{$employees->first_name}}</td>
                      <td>{{$employees->last_name}}</td>
                      <td>@if($employees->company!=""){{ $employees->company->name}} @endif</td>
                      <td>{{$employees->email}}</td>
                      <td>{{$employees->phone}}</td>
                      <td><button class="btn btn-sm btn-primary" ><a  href="{{route('employees.show',$employees->id)}}" class="text-white">Read</a></button>
                        <button class="btn btn-sm btn-primary"><a  href="{{route('employees.edit',$employees->id)}}" class="text-white" >Edit</a></button>
                         
                       <form style="display: inline-block;" action="{{route('employees.destroy',$employees->id)}}" onsubmit="return ConfirmDelete()" method="post">

                      <input type="hidden" name="_method" value="delete">

                      <input type="hidden" name="_token" value="{{csrf_token()}}"><button type="submit" class="btn btn-sm btn-danger">Delete</button>

                    </form>


                    </tr>
                    @endforeach
                    @endif
                     
                  </tbody>
                </table>
                 
                {{$data['employees']->links("pagination::bootstrap-4")}}
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
