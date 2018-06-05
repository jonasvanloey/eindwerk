<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Endavant</title>
</head>
<body>
<div class="top-bar">
    <div>
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="/home"><img src="{{asset('img/endavant_logo.svg')}}" alt="logo endavant"
                                                      class="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav justify-content-end d-flex flex-fill">
                    <li class="nav-item {{ active_class(if_route('home')||if_route('/')) }}">
                        <a class="nav-link" href="/home">Home</a>
                    </li>
                    <li class="nav-item {{ active_class(if_controller('App\Http\Controllers\PostingController')) }}">
                        <a class="nav-link" href="/jobs">Jobs</a>
                    </li>
                    @auth
                    <li class="nav-item {{ active_class(if_route('favorite')) }}">
                        <a class="nav-link" href="/favorite">Favorieten</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="/inbox">Berichten</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{asset('img/imgplaceholder.jpg')}}" alt="" class="rounded-circle profile-nav">
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->hasRole('student'))
                                <a class="dropdown-item nav-link {{ active_class(if_controller('App\Http\Controllers\StudentController')) }}"
                                   href="{{route('profile.show',Auth::user()->student->id)}}">Profiel</a>
                            @elseif(Auth::user()->hasRole('company'))
                                <a class="dropdown-item nav-link {{ active_class(if_controller('App\Http\Controllers\CompanyController')) }}"
                                   href="{{route('company.show',Auth::user()->companies->first()->id)}}">Bedrijf</a>
                            @endif
                            <a class="dropdown-item nav-link" href="invite">Vrienden uitnodigen</a>
                            <a href="{{ url('/logout') }}" class="dropdown-item nav-link"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">Uitloggen
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registreer</a>
                        </li>
                        @endauth
                        </li>
                </ul>
            </div>
        </nav>
    </div>


</div>
</div>
<div class="">
    @yield('content')
</div>
<footer class="d-flex justify-content-center">
    <div class="d-flex flex-column align-self-center">
        <img src="{{asset('img/endavant_logo.svg')}}" alt="logo endavant" class="logo align-self-center">
        <p><a href="">Algemene voorwaarden</a> | <a href="">Privacy verklaring</a></p>
    </div>
</footer>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/favorite.js') }}"></script>

</body>
</html>
