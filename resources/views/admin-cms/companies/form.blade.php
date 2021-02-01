@extends('admin-cms.layouts.app')

@section('title', isset($company) ? "Edit Company" : "Create Company")

@section('content')
    
    <a class="btn btn-secondary" href="{{ route('companies.index') }}">Back to Companies</a>
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
        @if (isset($company))
            action="{{ route('companies.update', $company) }}"
        @else
            action="{{ route('companies.store') }}"
        @endif
        enctype="multipart/form-data">
        @isset($company)
            @method('PUT')
        @endisset
        @csrf
        <div class="form-group mt-3">
            <label for="name">Company Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', isset($company) ? $company->name : "") }}"  placeholder="Enter name" required>
        </div>
        <div class="form-group mt-3">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', isset($company) ? $company->email : "") }}" required aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group mt-3">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', isset($company) ? $company->phone : "") }}"  placeholder="Enter phone" required>
        </div>
        <div class="form-group mt-3">
            <label for="website">Website</label>
            <input type="text" class="form-control" id="website" name="website" value="{{ old('website', isset($company) ? $company->website : "") }}"  placeholder="Enter website" required>
        </div>
        <div class="form-group mt-3">
            <label for="file">Select logo</label>
            <input type="file" class="form-control-file" id="logo" value="{{ old('logo'), isset($company) ? $company->logo : "" }}" name="logo" >
            <small id="fileHelp" class="form-text text-muted">* max size [100x100]</small>
          </div>
        <button class="btn btn-primary">Submit</button>
    </form>
@endsection