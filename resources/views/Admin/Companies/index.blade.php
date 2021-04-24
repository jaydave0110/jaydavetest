@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row"> <div class="col-md-6"><a href="{{route('companies.create')}}" class="btn btn-sm btn-success">Add New Record</a></div><div class="col-md-6"><a href="{{route('admin.home')}}" class="btn btn-sm btn-success">Home</a></div></div>
            <div class="card">
                @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                    @if($data['companies']->total()>0)
                    @foreach($data['companies']  as $key=>$companies)
                    <tr>
                      <th scope="row">{{$key+1}}</th>
                      <td>{{$companies->name}}</td>
                      <td>{{$companies->email}}</td>
                      <td><button class="btn btn-sm btn-primary" ><a  href="{{route('companies.show',$companies->id)}}" class="text-white">Read</a></button>
                        <button class="btn btn-sm btn-primary"><a  href="{{route('companies.edit',$companies->id)}}" class="text-white" >Edit</a></button>
                         
                       <form style="display: inline-block;" action="{{route('companies.destroy',$companies->id)}}" onsubmit="return ConfirmDelete()" method="post">

                      <input type="hidden" name="_method" value="delete">

                      <input type="hidden" name="_token" value="{{csrf_token()}}"><button type="submit" class="btn btn-sm btn-danger">Delete</button>

                    </form>


                    </tr>
                    @endforeach
                    @endif
                     
                  </tbody>
                </table>
                {{$data['companies']->links("pagination::bootstrap-4")}}
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
