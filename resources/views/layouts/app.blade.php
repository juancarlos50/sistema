<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Medical') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                 <img class="logotipo-barra" src="http://proyectomedicalbases.herokuapp.com/imagenes/isologo_para_barra.png" style="width: 200px; height: 70px;" b="" alt="logotipo">


                <!-- <nav class="navbar navbar-dark bg-primary" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('doctors.index') }}">{{ __('Doctores') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('especialidads.index') }}">{{ __('Especialidades') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('eps.index') }}">{{ __('Eps') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('historias_clinicas.index') }}">{{ __('Historia Clinica') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pacientes.index') }}">{{ __('Pacientes') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('agendamiento_de_citas.index') }}">{{ __('Agendar Cita') }}</a>
                    </li>
                    <ul class="navbar-nav mr-auto">
                </ul> --> 
                
                
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                      <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
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
                        @endguest
                    </ul>
                </nav>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
