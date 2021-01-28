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
                <td style="display: flex; ">
                    <a class="btn btn-secondary" href="{{ route('companies.show', $company) }}">Info</a>
                    <a class="btn btn-warning" href="{{ route('companies.edit', $company) }}">Edit</a>
                    <div style="margin: 0 4px"> @include('admin-cms.companies.delete-form', ['route' => 'companies.destroy','field' => $company]) </div>
                </td>
            </tr>
        @empty
    
        @endforelse
    </tbody>
    </table>  
    <div class="mx-auto text-center">
        {{ $companies->onEachSide(5)->links() }}
    </div>
    @endisset
@endsection