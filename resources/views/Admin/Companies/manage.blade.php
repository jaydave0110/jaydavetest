@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row"> <div class="col-md-6"><a href="{{route('companies.index')}}" class="btn btn-sm btn-success">Back</a></div></div>
            <div class="card">
                 @if ($errors->any())
                  <ul class="alert alert-danger  alert-dismissable">
                    @foreach($errors->all() as $error)
                        <li style=" list-style-type: none;" >{{ $error }}</li>
                    @endforeach
                  </ul> 
                @endif

                @if($data['action']=="create")
               
                  
                
                <form id="category-form" enctype="multipart/form-data" method="post" role="form" action="{{route('companies.store')}}"  class="form-horizontal" >

                  @csrf


                  @include('Admin.Companies.common.form-fields')

                  @else 

                  {{ Form::model($data['companies'], array('route' => array('companies.update', $data['companies']->id),'id'=>'category-form1','enctype'=>'multipart/form-data')) }}

                  {{ method_field('PUT') }}
                   @include('Admin.Companies.common.form-fields')
                  <input type="hidden" name="id" value="{{$data['companies']->id}}">

                  @csrf

             @endif
 
            </div>
        </div>
    </div>
</div>
@endsection
