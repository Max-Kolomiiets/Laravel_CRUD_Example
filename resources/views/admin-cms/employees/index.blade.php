@extends('admin-cms.layouts.app')

@section('title', 'Employees list')

@section('content')
    @isset($employees)
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Company</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($employees as $employee)
            <tr>
                <th scope="row">{{ $employee->id }}</th>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->lastname }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->company->name }}</td>
                
                <td style="display: flex;">
                    <a class="btn btn-warning" href="">Edit</a>
                    <a style="margin: 0 4px" class="btn btn-danger" href="">Delete</a>
                </td>
            </tr>
        @empty
    
        @endforelse
    </tbody>
    </table>  
    @endisset
@endsection