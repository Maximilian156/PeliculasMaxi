<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Peliculas-Maxi') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--Mi propio archivo css-->
    <link rel="stylesheet" href="{{asset('css/master.css')}}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                  <?php // {{ config('app.name', 'Laravel') }} ?>
                  <img src="{{ asset('img/logo.jpg') }}" class="rounded" alt="" width="80px" height="40px">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                                <a class="nav-link text-white" href="{{route('actores')}}">{{ __('Actores') }}</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link text-white" href="{{route('generos')}}">{{ __('Generos') }}</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('administrarPelicula') }}">{{ __('Administrar Peliculas') }}</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('administrarActores') }}">{{ __('Administrar Actores') }}</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Registrarme') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class='vh'>
            @yield('content')
        </main>
        <div class="d-flex">
        <footer class="bg-dark piedepag row">
          <article class="sucursales col-12 col-md-4 __artpie">
            <h4>Cines</h4>
            <p>Centro</p>
            <p>Av. Lima 4867</p>
            <br>
            <p>Monroe</p>
            <p>Monroe 867</p>
          </article>
          <article class="sucursales col-12 col-md-4 __artpie">
            <h4>Contacto</h4>
            <p>E-Mail</p>
            <p>peliculas.maxi@gmail.com</p>
            <br>
            <p>Teléfono</p>
            <p>0800-1603-1991</p>
          </article>
          <article class="sucursales col-12 col-md-4 __artpie">
            <h4>Opciones</h4>
            <a href="#">Proximos estrenos</a>
            <br>
            <a href="#">Publicidad</a>
            <br>
            <a href="#">Contacto</a>
            <br>
            <a href="#">Administrador</a>
          </article>
        </footer>
      </div>
    </div>
</body>
</html>