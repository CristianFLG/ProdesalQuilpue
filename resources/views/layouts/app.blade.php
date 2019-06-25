<!DOCTYPE html>
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
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/imgareaselect.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/imagen.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li  class="nav-item">          
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item"><a class="nav-link" href="/admin">Inicio</a></li>
                            <li><a  class="nav-link" href="{{ route('productores.index') }}">Productores</a></li>
                            <li><a  class="nav-link" href="{{ route('productos.index') }}">Productos</a></li>
                            <li><a  class="nav-link" href="{{ route('experiencias.index') }}">Experiencias</a></li>
                            <li><a  class="nav-link" href="{{ route('territorios.index') }}">Territorios</a></li>
                            <li><a  class="nav-link" href="{{ route('eventos.index') }}">Eventos</a></li>
                            <li><a  class="nav-link" href="{{ route('portadas.index') }}">Manejo Portada</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('asociaciones.index') }}">Asociaciones</a>
                                    <a class="dropdown-item" href="{{ route('capitalcultural.index') }}">Capital Cultural</a>
                                    <a class="dropdown-item" href="{{ route('rubros.index') }}">Rubros</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesion') }}
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
        </div>
@if (session('info'))
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="alert alert-success">
                            {{ session('info') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if(count($errors))            
            <div class="container">
                <div class="row">
                    <div class="col-md-2"> </div> 
                    <div class="col-md-8">
                        <div class="alert alert-success">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        @endif
        <br>
            @yield('content') 
    </div>
</body>
</html>
@yield('scripts')
