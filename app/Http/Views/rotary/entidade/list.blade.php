@extends('panel::layout.dash')
@section('title') Listar Entidades @endsection
@section('content')

    @include('panel::layout.errors')
    @include('panel::layout.success')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4>LISTAR DE ENTIDADES</h4>
            </div>
            <div class="card-body">
                @if(isset($lista) && sizeof($lista) > 0)
                    <div>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th width="50%">Nome</th>
                                            <th>CPF</th>
                                            <th>Celular</th>
                                            <th>Email</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($lista as $entidade)
                                            <tr>
                                                <th scope="row">{{$entidade->id}}</th>
                                                <td>{{$entidade->name}}</td>
                                                <td>{{$entidade->cnpj}}</td>
                                                <td>{{$entidade->celular}}</td>
                                                <td>{{$entidade->email}}</td>
                                                <td>
                                                    <a href="{{route('rotary.entidade.demandaMensal', ['idEntidade' => $entidade->id])}}">
                                                        <button class="btn-primary" title="Cadastrar Demanda mensal">
                                                            <i class="fa fa-calendar-plus-o"></i>
                                                        </button>
                                                    </a>

                                                    <a href="{{route('rotary.home.edit.entidade', ['idEntidade' => $entidade->id])}}">
                                                        <button class="btn-primary" title="Editar">
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                    </a>

                                                    <button type="button" class="btn-danger" data-toggle="modal" data-target="#modal_delete_{{$entidade->id}}" title="Excluir">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                            <div class="modal fade " id="modal_delete_{{$entidade->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
                                                <div class="modal-dialog modal-dialog-centered " role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <ul>
                                                                <li><strong>ID: </strong>{{$entidade->id}}</li>
                                                                <li><strong>Nome: </strong>{{$entidade->name}}</li>
                                                                <li><strong>Email: </strong>{{$entidade->email}}</li>
                                                                <li><strong>CPF: </strong>{{$entidade->cpf}}</li>
                                                            </ul>
                                                            <h4 class="align-items-center">EXCLUIR O USUÁRIO COM AS INFORMAÇÕES ACIMA?</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="{{route('rotary.entidade.excluir', ['idUsuario' => $entidade->id])}}"><button class="btn btn-danger">Excluir</button></a>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection