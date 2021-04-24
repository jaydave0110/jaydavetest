@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Admin {{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div class="row">
                         
                            <div class="col-md-6"><a href="{{route('companies.index')}}" class="btn btn-sm btn-primary">Companies</a></div>
                            <div class="col-md-6" ><a href="{{route('employees.index')}}" class="btn btn-sm btn-primary">Employees</a></div>
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
