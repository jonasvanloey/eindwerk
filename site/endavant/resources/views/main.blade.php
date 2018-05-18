<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Endavant</title>
</head>
<body>
<div class="top-bar">
    {{--@if (Route::has('login'))--}}
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
                    <li class="nav-item active">
                        <a class="nav-link" href="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Jobs</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="#">Favorieten</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Berichten</a>
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
{{--@endif--}}
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
</body>
</html>
