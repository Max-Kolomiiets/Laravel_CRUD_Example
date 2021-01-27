@extends('admin-cms.layouts.app')

@section('title', 'Companies list')

@section('content')
    <a class="btn btn-success" href="{{ route('companies.create') }}">Create new company</a>
    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

    @isset($companies)
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($companies as $company)
            <tr>
                <th scope="row">{{ $company->id }}</th>
                <td>{{ $company->name }}</td>
                <td>{{ $company->email }}</td>
                <td style="display: flex;">
                    <a class="btn btn-warning" href="{{ route('companies.edit', $company) }}">Edit</a>
                    <div style="margin: 0 4px"> @include('admin-cms.delete-form', ['route' => 'companies.destroy','company' => $company]) </div>
                    {{-- <a style="margin: 0 4px" class="btn btn-danger" href="{{ route('companies.destroy', $company) }}">Delete</a> --}}
                </td>
            </tr>
        @empty
    
        @endforelse
    </tbody>
    </table>  
    @endisset
@endsection