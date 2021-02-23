<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengaduan | @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>
    <script src="{{ asset('js/fontawesome.min.js') }}"></script>

    @yield('assets')
</head>
<body>

    @if(\Session::has('success'))
    <div role="alert" class="alert alert-success alert-dismissible show position-fixed alert-respond fade">
        <ul class="mb-0 pb-0">
            <li>{{ \Session::get('success') }}</li>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(\Session::has('error'))
    <div role="alert" class="alert alert-danger alert-dismissible show position-fixed alert-respond fade">
        <ul class="mb-0 pb-0">
            <li>{{ \Session::get('error') }}</li>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    @yield('content')
</body>
</html>
