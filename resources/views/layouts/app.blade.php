<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Agente Autorizado</title>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/7a2abce9af.js"></script>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background:black">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="text-align: center;">
                    <ul class="navbar-nav mr-auto" style="color:#2e3436; font-size: 140%;float: none;">
                        <b style="color:white;">Solicitação de Manutenção (DDD @if(auth()->user()->cluster == 'BNU')
                        Cluster BNU)
                        @else
                        Cluster FNS)
                        @endif</b>
                    </ul>
                    @guest
                    @else
                        <ul class="navbar-nav" style="float: none;">
                            <li class="nav-item">
                                <a class="btn btn-app btn-success " style="margin-right:5px" href="{{route('home')}}"><i class="fa fa-edit" style="padding-right:5px"></i><b>Solicitar TT</b><span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item mr-auto">
                                <a class="btn btn-app btn-info" style="margin-right:5px" href="{{route('listar')}}"><i class="fa fa-list" style="padding-right:5px"></i><b>Listar TT</b><span class="sr-only"></span></a>
                            </li>
                            <!-- <li class="nav-item mr-auto">
                                <a class="btn btn-app btn-danger"  href="http://bit.ly/VIVO-WIFI" target="_blank"><i class="fa fa-gift" style="padding-right:5px"></i><b>Material WIFI</b><span class="sr-only"></span></a>
                            </li> -->
                            <li class="nav-item mr-auto">
                                <a class="btn btn-app btn-link"  href="{{route('homeBA')}}"><i class="fa fa-crosshairs" style="padding-right:5px"></i><b>IR para sistema de BA</b><span class="sr-only"></span></a>
                            </li>
                            
                        </ul>
                    @endguest
                    <ul class="navbar-nav ml-auto" style="float: none;">
                        @guest
                        @else
                            <li class="nav-item dropdown" >
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" style="color:white" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('trocaSenha')}}" style="background-color:#F0FFFF;font-size:12px;"><i class="fas fa-key" style="margin-right:10px"></i>Alterar Senha</a>
                                    @if(auth()->user()->admin == 'sim')
                                    <a class="dropdown-item" href="{{route('register')}}" style="background-color:#F0FFFF;font-size:12px;"><i class="fas fa-user-plus" style="margin-right:7px"></i>Registrar Usuário</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}" style="background-color:#DC143C;font-size:12px;"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"><i class="fas fa-power-off" style="margin-right:10px"></i> 
                                         {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        <!-- @if(auth()->user()->cluster == 'BNU')
                        <li class="nav-item" style="margin-left: 20px">
                                <a class="nav-link btn btn-outline-secondary" target="_blank" href="http://priori-ba.herokuapp.com/">Sistema de BA BNU</a>
                        </li>
                        @endif -->
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-5" style="background:white">
            @yield('content')
        </main>

    </div>
</body>
<footer class="footer text-center">
    <div class="container">
        Copyright ©2019
    </div>
    <div class="container">
        Elaborado por: Samuel Taira da Costa - Dúvidas ou sugestões? 
        <a href="mailto: samuel.tcosta@telefonica.com" target="_top">samuel.tcosta@telefonica.com</a>
        </div>
</footer>
</html>
