<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Agente Autorizado SC</title>

    <script src="{{ asset('js/app.js') }}" defer></script>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.js"></script>

    <link href="{{ asset('css/login2.css') }}" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

</head>
<body>
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
                <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <div class="text-center">
                                    <a class="btn btn-lg btn-dark btn-block btn-login text-uppercase font-weight-bold mb-2" style="background:black;" href="{{route('home')}}">Sistema de TT</a>
                                    <a class="btn btn-lg btn-light btn-block btn-login text-uppercase font-weight-bold mb-2" style="color:black;" href="{{route('homeBA')}}#">Sistema de BA</a>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
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