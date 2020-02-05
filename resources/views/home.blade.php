@extends('layouts.app')

@section('content')

    <script>        
        $(document).on("input", "#reclamacao", function () {
        var limite = 220;
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        $(".caracteres").text(caracteresRestantes);

        });

    </script>

    <div class="container" >
    
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                {{ Session::get('message') }}
            </p>
        @endif
                    
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark"><b style="color:white">Cadastro de preventiva</b></div>
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
                                    <label><b>Instância</b></label>
                                    <input required type="text" class="form-control" name="instancia"
                                           placeholder="Instância"><br>
                                        <label><b>Cidade</b></label>
                                        <select required name="cidade">
                                            @if (auth()->user()->cluster == 'BNU')
                                                <option value="Navegantes">Navegantes</option>
                                                <option value="Brusque">Brusque</option>
                                                <option value="Balneário Camboriú">Balneario Camboriu</option>
                                                <option value="Camboriú">Camboriu</option>
                                                <option value="Itajaí">Itajaí</option>
                                                <option value="Blumenau">Blumenau</option>
                                                <option value="Gaspar">Gaspar</option>
                                                <option value="Indaial">Indaial</option>
                                            @elseif (auth()->user()->cluster == 'JVE')
                                                <option value="Joinville">Joinville</option>
                                                <option value="Mafra">Mafra</option>
                                                <option value="Jaraguá do Sul">Jaraguá do Sul</option>
                                                <option value="São Bento do Sul">São Bento do Sul</option>
                                            @elseif (auth()->user()->cluster == 'FNS')
                                                <option value="Florianópolis">Florianópolis</option>
                                                <option value="São José">São José</option>
                                                <option value="Palhoça">Palhoça</option>
                                                <option value="Biguaçu">Biguaçu</option>
                                                <option value="Tubarão">Tubarão</option>
                                                <option value="Criciúma">Criciúma</option>
                                            @endif
                                        </select><br><br>
                                        
                                    <label><b>Reclamação do cliente</b></label>
                                    <textarea required rows="4" maxlength="220"
                                    name="reclamacao" id="reclamacao" cols="90" placeholder="Reclamação do cliente..."></textarea>
                                    <p style="color:#ff0000;">(<span class="caracteres">220</span> Restantes)</p>
                                    <br><label><b>Tipificação:</b></label>
                                    <select required name="tipificacao">
                                        <option value="banda">Banda</option>
                                        <option value="tv">Linha</option>
                                        <option value="linha">TV</option>
                                    </select>
                                    <input type="hidden" name="cluster" value="{{auth()->user()->cluster}}">
                                    <input type="hidden" name="encerramento" value="">
                                    <input type="hidden" name="resolucao" value="x">
                                    <input type="hidden" name="status" value="Pendente">
                                    <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                    <input type="hidden" name="criado_por" value="{{auth()->user()->name}}">
                                </div>

                                <button type="submit" class="btn btn-primary" formaction="{{route('cadastrar')}}">
                                <b> Enviar </b>
                                </button>
                            </form>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
