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
                <h3 class="login-heading mb-4">Agente Autorizado SC</h3>
                <form method="POST" action="{{ route('login') }}">
                        @csrf
                    <div class="form-label-group">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    <label for="inputEmail">Email</label>
                    </div>

                    <div class="form-label-group">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    <label for="inputPassword">Senha</label>
                    </div>
                    <!-- <p style="color:red">
                        Obs¹: Caso esteja com problema na senha, tente entrar com a padrão: Vivo123!
                    </p> -->
                    <!-- <p style="color:red">
                        Obs²:Quando estiver logado, agora é possível a alteração de senha.</p> -->
                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Entrar</button>
                    <div class="text-center">
                    <a disabled class="small" href="{{ route('password.request') }}">Recuperar senha?</a></div>
                </form>
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