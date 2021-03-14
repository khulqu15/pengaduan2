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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>
    <script src="{{ asset('js/fontawesome.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>

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

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Adu.co</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Pengaduan
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('index.complaint') }}">List Data</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('form.pengaduan') }}">Tambah Data</a></li>
                </ul>
              @if (Auth::check())
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle btn btn-warning px-4" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('profile.user') }}">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
              </li>
              @else
              </li>
                <li class="nav-item">
                  <a class="btn btn-warning mx-2 px-4 py-2" href="{{ route('loginView') }}">Login</a>
                </li>
                <li class="nav-item">
                  <a class="btn btn-light mx-2 px-4 py-2" href="{{ route('registerView') }}">Register</a>
                </li>
              </li>    
              @endif
            </ul>
          </div>
        </div>
      </nav>

    @yield('content')

    <footer class="container-fluid py-5">
        <div class="row">
            <div class="col-md-12 text-center">
                @2021 Developed By Cahyooo
            </div>
        </div>
    </footer>
</body>
</html>
