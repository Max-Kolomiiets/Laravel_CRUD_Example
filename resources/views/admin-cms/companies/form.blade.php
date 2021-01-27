@extends('admin-cms.layouts.app')

@section('content')
    <h2>Create Company</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-3">
            <label for="name">Company Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"  placeholder="Enter name" required>
        </div>
        <div class="form-group mt-3">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group mt-3">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}"  placeholder="Enter phone" required>
        </div>
        <div class="form-group mt-3">
            <label for="website">Website</label>
            <input type="text" class="form-control" id="website" name="website" value="{{ old('website') }}"  placeholder="Enter website" required>
        </div>
        <div class="form-group mt-3">
            <label for="file">Select logo</label>
            <input type="file" class="form-control-file" id="logo" value="{{ old('logo') }}" name="logo" required>
            <small id="fileHelp" class="form-text text-muted">* max size [100x100]</small>
          </div>
        <button class="btn btn-primary">Submit</button>
    </form>
@endsection