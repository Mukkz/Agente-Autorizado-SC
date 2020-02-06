@extends('layouts.app')

@section('content')


    <script>        
        $(document).on("input", "#encerramento", function () {
        var limite = 220;
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        $(".caracteres").text(caracteresRestantes);

        });

    </script>

    <div class="container" style="font-size:14px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark"><b style="color:white">Fechar preventiva</b></div>
                    @if(count($errors) != 0)
                        @foreach($errors->all() as $erro)
                            <div class="teste alert alert-danger alert-dismissible" role="alert"
                                 style="text-align: center; position: absolute; top: 37%; left: 15%; width: 84%">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <p>{{$erro}}</p>
                            </div>
                        @endforeach
                    @endif

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <main role="main" class="container">
                            <form method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label><b>Nome do cliente</b></label>
                                    <input disabled type="text" class="form-control" name="cliente"
                                           value="{{isset($registro->cliente) ? $registro->cliente : ''}}">
                                    <label><b>Instância</b></label>
                                    <input disabled required type="text" class="form-control" name="instancia"
                                           value="{{isset($registro->instancia) ? $registro->instancia : ''}}"><br>
                                    <label><b>Reclamação do cliente</b></label>
                                    <input disabled required type="text" class="form-control" name="reclamacao"
                                           value="{{isset($registro->reclamacao) ? $registro->reclamacao : ''}}">
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="trava"value="atualizar" checked>
                                        <label class="form-check-label" for="trava">
                                            <b style="color:green">Atualizar</b>
                                        </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="trava" value="fechar">
                                        <label class="form-check-label" for="trava">
                                        <b style="color:red">Fechar</b>
                                        </label>
                                    </div><br>
                                    <br><label><b>Informação</b></label><br>
                                    <!-- <input required type="text" name="encerramento"> -->
                                    <textarea rows="3" maxlength="220" name="encerramento" id="encerramento" cols="105"></textarea>
                                    <p style="color:#ff0000;">(<span class="caracteres">220</span> Restantes)</p>
                                    <div class="container">
                                        <input type="hidden" name="resolucao" value="Fechado">
                                        <input type="hidden" name="status" value="Fechado">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary" formaction="{{route('realizarFechamento', $registro->id)}}">
                                <b>Enviar</b>
                                </button>
                                <a class="btn btn-dark" href="{{route('listar')}}">
                                <b>Voltar</b>
                                </a>
                            </form>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
