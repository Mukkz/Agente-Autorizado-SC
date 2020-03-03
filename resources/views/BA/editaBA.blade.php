@extends('layouts.BA')

@section('content')


    <script>        
        $(document).on("input", "#encerramento", function () {
        var limite = 190;
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        $(".caracteres").text(caracteresRestantes);

        });

    </script>

    <div class="container" style="font-size:14px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-light"><b style="color:white">Editar Informação</b></div>

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
                                    <label><b>Documento</b></label>
                                    <input disabled required type="text" class="form-control" name="documento"
                                           value="{{isset($registro->documento) ? $registro->documento : ''}}"><br>
                                    <label><b>Informação da ordem</b></label>
                                    <input disabled required type="text" class="form-control" name="reclamacao"
                                           value="{{isset($registro->informacao) ? $registro->informacao : ''}}">
                                    <br>
                                    <label><b>Editar informação</b></label><br>
                                    <textarea rows="3" maxlength="190" name="informacao" id="encerramento" cols="105"></textarea>
                                    <p style="color:#ff0000;">(<span class="caracteres">190</span> Restantes)</p>
                                </div>

                                <div class="container">
                                    <input type="hidden" name="resolucao" value="Fechado">
                                    <input type="hidden" name="status" value="Fechado">
                                </div>

                                <button type="submit" class="btn btn-primary" formaction="{{route('editarBA', $registro->id)}}">
                                <b>Enviar</b>
                                </button>
                                <a class="btn btn-dark" href="{{route('listaBA')}}">
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
