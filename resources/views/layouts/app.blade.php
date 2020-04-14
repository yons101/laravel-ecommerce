<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    {{-- mine --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ecom</title>

    <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Nunito:400,900') }}">

    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/fonts/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/Bootstrap-Payment-Form.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/css/Footer-Basic.css') }}">

    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/Navigation-Clean.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">



    {{-- end mine --}}
</head>
<body>
    <div id="app">

        <header>
            <nav class="navbar navbar-light navbar-expand-md navigation-clean mb-0">
                <div class="container"><a class="navbar-brand" href="{{ url('/') }}"><i class="fab fa-apple logo"></i>Apple101</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle

                            navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav mx-auto">
                            <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('category.show', 'iphone')}}">iPhone</a></li>

                            <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('category.show', 'mac')}}">Mac</a></li>

                            <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('category.show', 'ipad')}}">iPad</a></li>


                        </ul>
                        <ul class="nav navbar-nav">


                            @guest
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <i class=" fas fa-user"></i>
                                </a>
                            </li>


                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else


                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                            <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('cart') }}"><i class=" fas fa-shopping-cart"></i></a></li>

                            @endguest

                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="container main-container">

            <main class="py-4">

                @yield('content')

            </main>
        </div>

        <div class="footer-basic">
            <footer>
                <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a>
                </div>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">Home</a></li>
                    <li class="list-inline-item"><a href="#">About</a></li>
                    <li class="list-inline-item"><a href="#">Terms</a></li>
                    <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                </ul>
                <div id="copyright-container">
                    <p class="copyright">Apple101 © 2020</p>
                </div>
            </footer>
        </div>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bs-init.js"></script>
    </div>


</body>

</html>