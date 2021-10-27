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
                <li class="nav-item"><a class="nav-link" href=""><i class="fa fa-twitter"></i>My profile</a></li>
                <li class="nav-item"><a class="nav-link" href=""><i class="fa fa-github"></i></a></li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

<div class="container h-100">
    <div class="col justify-content-center">
        <img
            src="{{asset('storage/' . $projectDetails->image)}}"
            class="row-md-4  img-fluid w-100 shadow-1-strong rounded mb-4"
            alt=""
        />
        <p class="mb">{{$projectDetails->title}}</p>
        <p class="mb">{{$projectDetails->description}}</p>
        <small class="float-right">
            <span title="Likes" id="saveLikesDislikes" data-type="likes" data-post="{{ $projectDetails->id }}"
            class="btn-small mr-2"> Like
{{--                <span class="like-count"> {{ $projectDetails->likes() }}</span>--}}
            </span>

            <span title="Dislikes" id="saveLikesDislikes" data-type="dislike" data-post="{{ $projectDetails->id }}"
                  class="btn-small mr-2"> Dislike
{{--                <span class="like-count"> {{ $projectDetails->dislikes() }}</span>--}}
            </span>
        </small>
    </div>
</div>



</body>
</html>
