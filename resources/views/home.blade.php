@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Auth::user()->role > 0)
                    {{ __('Welcome admin!') }}
                    @else
                    {{ __('Welcome, you are logged in!') }}
                    @endif

                    <p class="h2 mt-3">
                        <a href="{{ route('edit') }}">Edit your profile</a>
                    </p>

                    @if (Auth::user()->role == 0)
                    <p class="h2 mt-3 table-hover">Favorites</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
