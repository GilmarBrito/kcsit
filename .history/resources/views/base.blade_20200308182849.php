<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KCSIT - Clever Full Stack Developer Test Task</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Customers</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('customers.index') }}">List</a>
                        <a class="dropdown-item" href="{{ route('customers.create')}}">New</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    @include('flash-message')
    <div class="container">
        @yield('main')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    
    <script>
        $(document).ready(function () {
            if ($('.alert')){
                $('.alert').fadeTo(2000, 500).slideUp(500, function(){
                    $(".alert-dismissible").alert('close');
                });
            } 
        });
    </script>

</body>
</html>
