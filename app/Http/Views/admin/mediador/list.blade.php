@extends('panel::layout.dash')
@section('title') Listar Rotarianos @endsection
@section('content')

    @include('panel::layout.errors')
    @include('panel::layout.success')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4>LISTAR ROTARIANOS</h4>
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
                                            @foreach($lista as $usuario)
                                                <tr>
                                                    <th scope="row">{{$usuario->id}}</th>
                                                    <td>{{$usuario->name}}</td>
                                                    <td>{{$usuario->cpf}}</td>
                                                    <td>{{$usuario->celular}}</td>
                                                    <td>{{$usuario->email}}</td>
                                                    <td>
                                                        <a href="{{route('admin.home.edit.mediador', ['idUsuario' => $usuario->id])}}">
                                                            <button class="btn-primary" title="Editar">
                                                                <i class="fa fa-pencil"></i>
                                                            </button>
                                                        </a>
                                                        <button type="button" class="btn-danger" data-toggle="modal" data-target="#modal_delete_{{$usuario->id}}" title="Excluir">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>

                                                <div class="modal fade " id="modal_delete_{{$usuario->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
                                                    <div class="modal-dialog modal-dialog-centered " role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <ul>
                                                                    <li><strong>ID: </strong>{{$usuario->id}}</li>
                                                                    <li><strong>Nome: </strong>{{$usuario->name}}</li>
                                                                    <li><strong>Email: </strong>{{$usuario->email}}</li>
                                                                    <li><strong>CPF: </strong>{{$usuario->cpf}}</li>
                                                                </ul>
                                                                <h4 class="align-items-center">EXCLUIR O USUÁRIO COM AS INFORMAÇÕES ACIMA?</h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="{{route('admin.mediador.excluir', ['idUsuario' => $usuario->id])}}"><button class="btn btn-danger">Excluir</button></a>
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