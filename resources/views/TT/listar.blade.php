@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Preventiva cadastrada com sucesso  <i class="icon fa fa-check"></i>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header bg-dark" style="padding:8px">
                        <b style="color:white;margin-left:1%">Lista de Solicitações</b>
                            @if(auth()->user()->admin == 'sim')
                                <label style="color:white;margin-left: 60%;" for="filtros">Filtros:</label>
                                <a class="btn btn-outline-primary btn-sm"  href="{{route('listarAbertos')}}"><b>Abertos</b></a>
                                <a class="btn btn-outline-warning btn-sm"  href="{{route('listarPendentes')}}"><b>Pendentes</b></a>
                                <a class="btn btn-outline-danger btn-sm"  href="{{route('listar')}}"><b>Todos</b></a>
                            @endif
                    </div>
                    <div class="container-fluid">
                        @if(auth()->user()->admin == 'sim')
                        <form action="{{route('searchADM')}}" method="GET">
                            <div class="" style="margin:8px;margin-left:0">
                                <input type="search" class="form-control-sm fas fa-search"
                                           placeholder="&#xf002; INSTÂNCIA"
                                           size="12px" name="valorPesquisado" style="margin-left:5px">
                                <button class="btn btn-light" type="submit">Pesquisar Ordem</button>
                                <a class="btn btn-success btn-sm" style="margin-left:5px" href="{{route('export')}}">Exportar Excel</a>
                            </div>
                        </form>                        
                        @else
                            <form action="{{route('search')}}" method="GET">
                                <div style="margin:8px;margin-left:0">
                                    <input type="search" class="form-control-sm fas fa-search"
                                           placeholder="&#xf002; INSTÂNCIA"
                                           size="12px" name="valorPesquisado" style="margin-left:5px">
                                <button class="btn btn-light btn-sm" type="submit">Pesquisar Ordem</button>
                                </div>
                            </form>
                        @endif
                    </div>
                    <main role="main" class="container-fluid">
                        <table class="table table-sm table-hover" >
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Instância</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Cidade</th>
                                <th width="20%" scope="col">Reclamação</th>
                                <th scope="col">Status</th>
                                <th scope="col">Encerramento</th>
                                <th scope="col">Data abertura</th>
                                @if(auth()->user()->admin == 'sim')
                                    <th scope="col">Solicitante</th>
                                    <th scope="col">Tecnologia</th>
                                @endif
                                    <th scope="col">Ação</th>

                            </tr>
                            </thead>
                            <tbody style="font-size: 13px">
                            @foreach($preventivas as $preventiva)
                                <tr>
                                    <td>{{$preventiva->instancia}}</td>
                                    <td>{{$preventiva->cliente}}</td>
                                    <td>{{$preventiva->cidade}}</td>
                                    <td>{{$preventiva->reclamacao}}</td>
                                    <td><i class="btn-sm {{$preventiva->status == 'Pendente' ? 'btn-warning' : (
                                                             $preventiva->status == 'Aberto' ? 'btn-primary' : (
                                                             $preventiva->status == 'Fechado'?'btn-danger': 'btn-danger'
                                                              )
                                                          )}}">{{$preventiva->status}}</i></td>
                                    <td>{{$preventiva->encerramento}}</td>
                                    <td>{{$preventiva->created_at}}</td>
                                    @if(auth()->user()->admin == 'sim')
                                        <td>{{$preventiva->criado_por}}</td>
                                        <td>{{$preventiva->tecnologia}}</td>
                                        <td>
                                            @if($preventiva->status == 'Aberto')
                                                <div class="box-body">
                                                    <a href="{{route('fechar', $preventiva->id)}}">
                                                            <button type="button" class="btn-group-sm btn btn-sm btn-danger">
                                                                Fechar
                                                            </button>
                                                        </a>
                                                </div>
                                            @elseif($preventiva->status == 'Pendente')
                                                <div class="box-body">
                                                    <a onclick="return confirm('Confirmar abertura da preventiva?')" href="{{route('realizarAbertura', $preventiva->id)}}">
                                                        <button class="btn btn-sm btn-primary btn-group-sm" >
                                                            Abrir
                                                        </button>
                                                    </a>
                                                </div>
                                            @endif
                                    @else
                                        <td>
                                            @if($preventiva->status == 'Aberto')
                                                <div class="box-body">
                                                    <a href="{{route('editarInfo', $preventiva->id)}}">
                                                            <button type="button" class="btn-group-sm btn btn-sm btn-dark">
                                                                Editar Info
                                                            </button>
                                                        </a>
                                                </div>
                                            @endif
                                        </td>
                                    @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </main>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                {{$preventivas -> links()}}
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
