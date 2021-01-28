@extends('admin-cms.layouts.app')

@section('title', isset($company) ? $company->name : "Unknown company")

@section('content')
    <a class="btn btn-secondary" href="{{ route('companies.index') }}">Back to Companies</a>
    @isset($company)

        <div class="card text-center mx-auto mt-5" style="width: 18rem;">
            <img class="card-img-top" src="{{ Storage::url($company->logo) }}" alt="Company Logo">
            <div class="card-body">
            <h5 class="card-title">{{ $company->name }}</h5>
            <hr>
            </div>
            <ul class="list-group list-group-flush">
            <li class="list-group-item">{{ $company->email }}</li>
            <li class="list-group-item">{{ $company->phone }}</li>
            <li class="list-group-item">{{ $company->website }}</li>
            </ul>
            <div class="card-body d-flex">
                <a class="btn btn-warning" href="{{ route('companies.edit', $company) }}">Edit</a>
                <div style="margin: 0 4px"> @include('admin-cms.delete-form', ['route' => 'companies.destroy','company' => $company]) </div>
            </div>
        </div>
        
    @endisset
@endsection