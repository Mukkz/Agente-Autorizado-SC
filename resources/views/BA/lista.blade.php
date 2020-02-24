@extends('layouts.BA')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="icon fa fa-check"></i>Priorização cadastrado com sucesso.
                    </div>
                @endif
                <div class="card">
                    <div class="card-header" style="padding:8px; padding-left:20px">
                        <label for="Lista"><b>Listagem de Solicitações</b></label>
                        @if(auth()->user()->admin == 'sim')
                        <a class="btn btn-success btn-sm" style="margin:5px;" href="{{route('exportBA')}}">Exportar Excel</a>
                                <label style="margin-left: 50%;" for="filtros">Filtros:</label>
                                <a class="btn btn-outline-primary btn-sm"  href="{{route('listarAbertosBA')}}"><b>Abertos</b></a>
                                <a class="btn btn-outline-warning btn-sm"  href="{{route('listarPendentesBA')}}"><b>Pendentes</b></a>
                                <a class="btn btn-outline-danger btn-sm"  href="{{route('listaBA')}}"><b>Todos</b></a>
                            @endif
                    </div><br>
                    <main role="main" class="container-fluid">

                        <table class="table table-sm table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Documento</th>
                                    <th scope="col">Info. Adicional</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Feedback</th>
                                    <th scope="col">Data abertura</th>
                                    @if(auth()->user()->admin == 'sim')
                                    <th scope="col">Solicitante</th>
                                    @endif
                                    <th scope="col">Ação</th>

                                </tr>
                            </thead>
                            <tbody style="font-size: 13px">
                            @foreach($bas as $ba)
                                <tr>
                                    <td>{{$ba->cliente}}</td>
                                    <td>{{$ba->documento}}</td>
                                    <td>{{$ba->informacao}}</td>
                                    <td><i class="btn-sm {{$ba->status == 'Pendente' ? 'btn-warning' : (
                                                             $ba->status == 'Em Tratamento' ? 'btn-primary' : (
                                                             $ba->status == 'Fechado'?'btn-danger': 'btn-danger'
                                                              )
                                                          )}}">{{$ba->status}}</i></td>
                                    <td>{{$ba->feedback}}</td>
                                    <td>{{$ba->created_at}}</td>
                                    @if(auth()->user()->admin == 'sim')
                                        <th>{{$ba->criado_por}}</th>
                                        <th>
                                            @if($ba->status == 'Em Tratamento')
                                                <div class="box-body">
                                                    <a href="{{route('fechar', $ba->id)}}">
                                                            <button type="button" class="btn-group-sm btn btn-sm btn-danger">
                                                                Fechar
                                                            </button>
                                                        </a>
                                                </div>
                                            @elseif($ba->status == 'Pendente')
                                                <div class="box-body">
                                                    <a onclick="return confirm('Confirmar tratamento da solicitação?')" href="{{route('alteraStatus', $ba->id)}}">
                                                        <button class="btn btn-sm btn-primary btn-group-sm" >
                                                            Tratar
                                                        </button>
                                                    </a>
                                                </div>
                                            @endif
                                    @else
                                        @if($ba->status == 'Em Tratamento')
                                            <th>        
                                                <div class="box-body">
                                                    <a href="{{route('editarInfoBA', $ba->id)}}">
                                                        <button type="button" class="btn-group-sm btn btn-sm btn-dark">
                                                            Editar Info
                                                        </button>
                                                    </a>
                                                </div>
                                                </th>
                                        @endif                                        
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </main>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                {{$bas -> links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript">

        setTimeout(function(){

            location.reload();

        },10000);

    </script>

@endsection
