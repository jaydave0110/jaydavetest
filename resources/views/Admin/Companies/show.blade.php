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
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Logo</th>
                      <th scope="col">Website</th>
                    </tr>
                  </thead>
                  <tbody>

                    @if($data['companies']!="")
                    
                    <tr>
                      <th scope="row"> </th>
                      <td>{{$data['companies']->name}}</td>
                      <td>{{$data['companies']->email}}</td>
                      <td> <img src="{{ url($data['companies']->logo) }}" height="100" width="100"></td>
                      <td>{{$data['companies']->website}}</td>
                       

                    </form>


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
