<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{csrf_token()}}">

        <title>{{config('app.name' , 'User Management System')}}</title>


        <!-- Styles -->
        <link href="{{asset('css/app.css')}}" rel="stylesheet">

        <!-- JS -->
        <script src="{{asset('js/app.js')}}" defer></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">{{config('app.name' , 'User Management System')}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @can('logged-in')
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('/home') }}">Home</a>
                        </li>
                        @can('is-admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.users.index')}}">Users</a>
                            </li>
                        @endcan
                    @endcan
                </ul>
                <div class="d-flex">
                    @if (Route::has('login'))
                        <div >
                            @auth
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link" href="{{ url('/home') }}" >Home</a>--}}
{{--                                    </li>--}}
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
{{--                                <a  href="{{ url('/home') }}" >Home</a>--}}

{{--                                <a href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>--}}
{{--                                <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none">--}}
{{--                                    @csrf--}}
{{--                                </form>--}}
                            @else
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}" >Log in</a>
                                    </li>
                                    <li class="nav-item">
                                        @if (Route::has('register'))
                                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                                        @endif
                                    </li>
                                </ul>
{{--                                <a href="{{ route('login') }}" >Log in</a>--}}

{{--                                @if (Route::has('register'))--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">Register</a>--}}
{{--                                @endif--}}
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>
        <main class="container">
            @include('partials.alerts')
            @yield('content')
        </main>
    </body>
</html>
