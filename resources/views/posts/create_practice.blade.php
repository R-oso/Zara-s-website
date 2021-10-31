<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>About</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('resources/js/jquery.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>

</head>

<body class="antialiased">
<!--NAVBAR STARTING-->
<nav class="navbar navbar-light navbar-expand-md bg-transparent justify-content-between">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse dual-nav w-50 order-1 order-md-0">
            <ul class="navbar-nav">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Log in</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>
                    @endif
                @endguest

                @auth
                    <a class="btn btn-primary" href="{{ url('/create') }}" role="button">Create new project</a>
                @endauth
            </ul>
        </div>
        <a href="/" class="navbar-brand mx-auto d-block text-center order-0 order-md-1 w-25">MARIA</a>
        <div class="navbar-collapse collapse dual-nav w-50 order-2">
            <ul class="nav navbar-nav ml-auto">
                @auth
                    <li class="nav-item"><a class="nav-link" href=""><i class="fa fa-twitter"></i>My profile</a></li>
                    <li class="nav-item"><a class="nav-link" href=""><i class="fa fa-github"></i></a></li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="page-wrapper bg-dark p-t-100 p-b-50">
    <div class="wrapper wrapper--w900">
        <div class="card card-6">
            <div class="card-heading">
                <h2 class="title">Create a new practice</h2>
            </div>
            <div class="card-body">
                <form method="POST" action='practice' enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="name">Name of the practice</div>
                        <label class="value">
                            <input class="input--style-6" type="text" name="name">
                        </label>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn--radius-2 btn--blue-2" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <h1 class="mt-5 row text-secondary font-weight-bolder">All current practices:</h1>
    </div>

    <div class="d-flex justify-content-center">
        @foreach($practices as $practice)
            <div class="row mx-auto mt-xl-5">
                <h2 class="font-italic font-weight-bolder text-center text-white">{{$practice->name}}</h2>
            </div>
        @endforeach
    </div>


</div>


</body>
</html>
