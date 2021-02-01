@extends('admin-cms.layouts.app')

@section('title', isset($employee) ? $employee->name : "Unknown Employee")

@section('content')
    <a class="btn btn-secondary" href="{{ route('employees.index') }}">Back to employees</a>
    @isset($employee)

        <div class="card mx-auto mt-5" style="width: 18rem;">
            <div class="card-body">
                Full name: <span class="text-info">{{ $employee->name . ' ' . $employee->lastname }}</span>
            </div>
            <div class="card-body">
                Email: <span class="text-info">{{ $employee->email }}</span>
            </div>
            <div class="card-body">
                Phone: <span class="text-info">{{ $employee->phone }}</span>
            </div>
            <div class="card-body">
                Company: <span class="text-info">{{ $employee->company->name }}</span>
            </div>
            <div class="card-body d-flex">
                <a class="btn btn-warning" href="{{ route('employees.edit', $employee) }}">Edit</a>
                <div style="margin: 0 4px"> @include('admin-cms.employees.delete-form', ['route' => 'employees.destroy','employee' => $employee]) </div>
            </div>
        </div>
        
    @endisset
@endsection