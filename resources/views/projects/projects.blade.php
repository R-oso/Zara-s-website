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
        </div>

        <a href="/" class="navbar-brand mx-auto d-block text-center order-0 order-md-1 w-25">MARIA</a>
        <div class="navbar-collapse collapse dual-nav w-50 order-2">
            <ul class="nav navbar-nav ml-auto">
                @auth
                    <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}"><i class="fa fa-twitter"></i>My
                            profile</a></li>
                @endauth

                <li class="nav-item">
                    <div class="container">
                        <form action="/search" method="GET" role="search">
                            @csrf
                            <div class="input-group">
                                <input type="search" class="form-control" name="search"
                                       placeholder="Search projects"> <span class="input-group-btn">
					                <button type="submit" class="btn btn-default">
						            <span class="glyphicon glyphicon-search"></span>
                                    </button>
				                </span>
                            </div>
                        </form>
                    </div>
                </li>
                @if(isset($practices))
                <li class="nav-item">
                    <div class="container">
                        <form action="/filter" method="GET" role="filter">
                            <label class="value">
                                <select class="input--style-6" name="practice_id">
                                    @foreach($practices as $practice)
                                        <option class="" value="{{$practice->id}}">
                                            {{$practice->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </label>

                            <div class="card-footer">
                                <button class="btn btn--radius-2 btn--blue-2" type="submit">Upload</button>
                            </div>
                        </form>
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<!-- Gallery -->

@if(isset($_GET['search']))
    <div>
        <h1>
            Dit zijn je zoekresultaten op '{{$search}}'
        </h1>
    </div>
@endif

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
