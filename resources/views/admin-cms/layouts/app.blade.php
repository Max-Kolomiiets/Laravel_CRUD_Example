<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'admin')</title>

    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

     <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/navbar-static/">

     <!-- Bootstrap core CSS -->
     <link href="{{ asset('css/css/bootstrap.min.css') }}" rel="stylesheet">
 
     <!-- Custom styles for this template -->
     <link href="{{ asset('css/navbar-top.css') }}" rel="stylesheet">

     <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <meta name="theme-color" content="#7952b3">
    {{-- <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style> --}}

    <link href="https://getbootstrap.com/docs/5.0/examples/checkout/form-validation.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <a class="navbar-brand" href="{{ route('home') }}">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            
            <li class="nav-item">
              <a class="nav-link " href="{{ route('companies.index') }}">Companies</a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('employees.index') }}">Employees</a>
              </li>
          </ul>

        </div>
      </nav>

<div class="container">
    <h1 class="text-center">@yield('title')</h1>
    <main>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endisset
        @if(session('danger'))
            <div class="alert alert-danger">{{ session('danger') }}</div>
        @endisset
        @yield('content')
    </main>
</div>

<script src="https://getbootstrap.com/docs/5.0/examples/checkout/form-validation.js"></script>
</body>
</html>