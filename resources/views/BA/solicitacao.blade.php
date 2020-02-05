@extends('layouts.BA')

@section('content')

    <script>        
        $(document).on("input", "#reclamacao", function () {
        var limite = 190;
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        $(".caracteres").text(caracteresRestantes);

        });

    </script>

    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><b>Cadastro de priorização</b></div>
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
                                    <input required type="text" class="form-control" name="cliente"
                                           placeholder="Nome do cliente">
                                    <label><b>Documento</b></label>
                                    <input required type="text" class="form-control" name="documento"
                                           placeholder="Documento"><br>

                                    <label><b>Informação adicional</b></label>

                                    <textarea required rows="4" maxlength="190"
                                    name="informacao" id="reclamacao" cols="90" placeholder="Data e período agendado, contato alternativo ... Informações adicionais."></textarea>
                                    <p style="color:#ff0000;">(<span class="caracteres">190</span> Restantes)</p>

                                    <input type="hidden" name="feedback" value="">
                                    <input type="hidden" name="status" value="Pendente">
                                    <input type="hidden" name="user_id" value="#">
                                    <input type="hidden" name="criado_por" value="#">
                                </div>

                                <button type="submit" class="btn btn-primary" formaction="#">
                                <b>Enviar</b>
                                </button>
                            </form>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
