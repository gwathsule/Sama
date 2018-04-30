@extends('panel::layout.dash')
@section('title') Listar Entidades @endsection
@section('content')

    @include('panel::layout.errors')
    @include('panel::layout.success')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4>PEDIDOS</h4>
            </div>
            <div class="card-body">
                <div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Compact Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Produto</th>
                                        <th>Quantidade</th>
                                        <th>Categoria</th>
                                        <th>Data de precisão</th>
                                        <th>status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $pedidos = $entidade->pedidos()->get();
                                    @endphp
                                    @foreach ($pedidos as $pedido)
                                        <tr>
                                            <th scope="row">{{$pedido->id}}</th>
                                            <td>{{$pedido->produto()->first()->nome}}</td>
                                            <td>{{$pedido->produto()->first()->qtd .  ' ' . $pedido->produto()->first()->unidade}}</td>
                                            <td>{{$pedido->produto()->first()->categoria}}</td>
                                            <td>{{$pedido->dataPrecisao}}</td>
                                            <td>{{$pedido->status}}</td>
                                            <td>
                                                <button type="button" class="btn-danger" data-toggle="modal" data-target="#modal_delete_{{$pedido->id}}" title="Excluir">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <div class="modal fade " id="modal_delete_{{$pedido->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
                                            <div class="modal-dialog modal-dialog-centered " role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ul>
                                                            <li><strong>ID: </strong>{{$pedido->id}}</li>
                                                            <li><strong>Produto: </strong>{{$pedido->produto()->first()->nome}}</li>
                                                        </ul>
                                                        <h4 class="align-items-center">EXCLUIR O PEDIDO COM AS INFORMAÇÕES ACIMA?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{route('rotary.pedido.excluir', ['idEntidade' => $entidade->id, 'idPedido' => $pedido->id])}}"><button class="btn btn-danger">Excluir</button></a>
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
            </div>
        </div>
    </div>
@endsection