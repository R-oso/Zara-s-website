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
                    <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}"><i class="fa fa-twitter"></i>My
                            profile</a></li>
                @endauth
            </div>
        <a href="/" class="navbar-brand mx-auto d-block text-center order-0 order-md-1 w-25">MARIA</a>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                <div class="card-header">{{ __('Your current profile data') }}</div>
                <div class="alert bg-light" role="alert">
                    <p class="h3 text-dark"> Name: {{Auth::user()->name}} </p>
                    <p class="h3 text-dark"> Email address: {{Auth::user()->email}}</p>
                </div>

                <form method="POST" action="update">
                    @csrf
                    @if($favorites >= 3)
                        <div class="alert">
                            You have liked 3 or more projects! Change your profile picture here.
                        </div>
                        <div class="form-group">
                            <label for="image"></label>
                            <input type="image">
                        </div>
                    @endif

                    <div class="form-group alert">
                        <label for="name">Name</label>
                        <input type="text" class="form-control-lg bg-dark text-white" name="name" id="name" placeholder="Your new username">
                    </div>

                    <div class="form-group alert">
                        <label for="email">Email</label>
                        <input type="text" class="form-control-lg bg-dark text-white" name="email" id="email" placeholder="Your new email address">
                    </div>

                    <div class="alert">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>

                    <div class="alert">
                        Forgot your password?
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>

</body>
