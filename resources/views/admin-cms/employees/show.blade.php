@extends('admin-cms.layouts.app')

@section('title', isset($employee) ? $employee->name : "Unknown Employee")

@section('content')
    <a class="btn btn-secondary" href="{{ route('employees.index') }}">Back to employees</a>
    @isset($employee)

        <div class="card text-center mx-auto mt-5" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $employee->name }}</h5>
                <hr>
            </div>
            <ul class="list-group list-group-flush">
            <li class="list-group-item">{{ $employee->email }}</li>
            <li class="list-group-item">{{ $employee->phone }}</li>
            <li class="list-group-item">{{ $employee->website }}</li>
            </ul>
            <div class="card-body d-flex">
                <a class="btn btn-warning" href="{{ route('employees.edit', $employee) }}">Edit</a>
                <div style="margin: 0 4px"> @include('admin-cms.employees.delete-form', ['route' => 'employees.destroy','employee' => $employee]) </div>
            </div>
        </div>
        
    @endisset
@endsection