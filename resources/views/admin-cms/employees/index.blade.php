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
                <td>{{ isset($employee->company) ? $employee->company->name : "No Company | Hired" }}</td>
                
                <td style="display: flex; ">
                    <a class="btn btn-secondary" href="{{ route('employees.show', $employee) }}">Info</a>
                    <a class="btn btn-warning" href="{{ route('employees.edit', $employee) }}">Edit</a>
                    <div style="margin: 0 4px"> @include('admin-cms.employees.delete-form', ['route' => 'employees.destroy','field' => $employee]) </div>
                </td>
            </tr>
        @empty
    
        @endforelse
    </tbody>
    </table>  
    <div class="mx-auto text-center">
        {{ $employees->onEachSide(5)->links() }}
    </div>
    @endisset
@endsection