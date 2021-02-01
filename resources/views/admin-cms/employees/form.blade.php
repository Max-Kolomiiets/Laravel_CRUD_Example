@extends('admin-cms.layouts.app')

@section('title', isset($employee) ? "Edit Employee" : "Create Employee")

@section('content')
    
    <a class="btn btn-secondary" href="{{ route('employees.index') }}">Back to Employees</a>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="POST"
        @if (isset($employee))
            action="{{ route('employees.update', $employee) }}"
        @else
            action="{{ route('employees.store') }}"
        @endif
        enctype="multipart/form-data">
        @isset($employee)
            @method('PUT')
        @endisset
        @csrf
        <div class="form-group mt-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', isset($employee) ? $employee->name : "") }}"  placeholder="Enter name" required>
        </div>
        <div class="form-group mt-3">
            <label for="name">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname', isset($employee) ? $employee->lastname : "") }}"  placeholder="Enter last name" required>
        </div>
        <div class="form-group mt-3">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', isset($employee) ? $employee->email : "") }}" required aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group mt-3">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', isset($employee) ? $employee->phone : "") }}"  placeholder="Enter phone" >
        </div>
        <div class="form-group mt-3">
            <label for="phone">Select Company</label>
            <select name="company_id" id="company_id">
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary mt-3">Submit</button>
    </form>
@endsection