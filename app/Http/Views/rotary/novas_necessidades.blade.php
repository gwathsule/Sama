@extends('panel::layout.dash')
@section('title') Necessidades @endsection
@section('content')

    @include('panel::layout.errors')
    @include('panel::layout.success')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <div class="card">
                        <div class="card-header">
                            <h4>NECESSIDADES</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Produto</th>
                                        <th>Quantidade</th>
                                        <th>Data de precisão</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($pedidos as $pedido)
                                        <tr>
                                            <th scope="row">{{$pedido->id}}</th>
                                            <td>{{$pedido->produto()->first()->nome}}</td>
                                            <td>{{$pedido->produto()->first()->qtd .  ' ' . $pedido->produto()->first()->unidade}}</td>
                                            <td>{{$pedido->dataPrecisao}}</td>
                                            <td>
                                                <button type="button" class="btn-group btn-primary" data-toggle="modal" data-target="#modal_aprovar_{{$pedido->id}}" title="Aprovar">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                                <button type="button" class="btn-group btn-dark" data-toggle="modal" data-target="#modal_desaprovar_{{$pedido->id}}" title="Não Aprovar">
                                                    <i class="fa fa-ban"></i>
                                                </button>
                                                <button type="button" class="btn-group btn-danger" data-toggle="modal" data-target="#modal_delete_{{$pedido->id}}" title="Excluir">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <div class="modal fade " id="modal_aprovar_{{$pedido->id}}" tabindex="-1" role="dialog" aria-labelledby="modal_aprovar">
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
                                                        <h4 class="align-items-center">APROVAR A NECESSIDADE COM AS INFORMAÇÕES ACIMA?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{route('rotary.pedido.aprovar', ['idPedido' => $pedido->id])}}"><button class="btn btn-primary">APROVAR</button></a>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade " id="modal_desaprovar_{{$pedido->id}}" tabindex="-1" role="dialog" aria-labelledby="modal_aprovar">
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
                                                        <h4 class="align-items-center">NÃO APROVAR A NECESSIDADE COM AS INFORMAÇÕES ACIMA?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{route('rotary.pedido.desaprovar', ['idPedido' => $pedido->id])}}"><button class="btn btn-danger">NÃO APROVAR</button></a>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade " id="modal_delete_{{$pedido->id}}" tabindex="-1" role="dialog" aria-labelledby="modal_aprovar">
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
                                                        <h4 class="align-items-center">APAGAR A NECESSIDADE COM AS INFORMAÇÕES ACIMA?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{route('rotary.pedido.excluir', ['idPedido' => $pedido->id])}}"><button class="btn btn-danger">APAGAR</button></a>
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