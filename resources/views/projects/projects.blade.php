<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

    </head>

<body class="antialiased">
<!--NAVBAR STARTING-->
<nav class="navbar navbar-light navbar-expand-md bg-transparent justify-content-between sticky-top">
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
                <li class="nav-item">
                    <a href="{{ url('/home') }}" class="nav-link">Home</a>
                </li>
            @endauth
            </ul>
        </div>
        <a href="/" class="navbar-brand mx-auto d-block text-center order-0 order-md-1 w-25">MARIA</a>
        <div class="navbar-collapse collapse dual-nav w-50 order-2">
            <ul class="nav navbar-nav ml-auto">
                @auth
                <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}"><i class="fa fa-twitter"></i>My profile</a></li>
                @endauth
                <li class="nav-item"><a class="nav-link" href=""><i class="fa fa-github"></i></a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Gallery -->

<div class="row">
    @foreach($projects as $project)
    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0 ml-4">
        <img
            src="{{asset('storage/' . $project->image)}}"
            class="w-100 shadow-1-strong rounded mb-4"
            alt=""
        />
        <a href="{{route('about', $project->id)}}"><p class="mb">{{$project->title}}</p></a>
    </div>
    @endforeach
</div>


    </body>


</html>
