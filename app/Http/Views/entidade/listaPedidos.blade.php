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
                <form class="form-control-lg" action="{{route('entidade.pedido.novo')}}"  method="post" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="idEntidade" value="{{$entidade->id}}">

                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">PRODUTO</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nome" placeholder="Nome do produto" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">DESCRIÇÃO</label>
                        <div class="col-sm-10">
                            <textarea name="descricao" maxlength="2000" placeholder="Descreva o produto" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">QUANTIDADE</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="qtd" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">UNIDADE</label>
                        <div class="col-sm-10 mb-3">
                            <select name="unidade" class="form-control">
                                <option value="0">un</option>
                                <option value="1">dz</option>
                                <option value="2">ml</option>
                                <option value="3">L</option>
                                <option value="4">kg</option>
                                <option value="5">g</option>
                                <option value="6">Caixa</option>
                                <option value="7">Embalagem</option>
                                <option value="8">Galão</option>
                                <option value="9">Garrafa</option>
                                <option value="10">Lata</option>
                                <option value="11">Pacote</option>
                                <option value="12">Fardo</option>
                                <option value="13">Profissional</option>
                                <option value="14">Eletrodoméstico</option>
                                <option value="15">Móvel</option>
                                <option value="16">Outro</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">CATEGORIA</label>
                        <div class="col-sm-10 mb-3">
                            <select name="categoria" class="form-control">
                                <option value="0">Alimentos</option>
                                <option value="1">Vestuários</option>
                                <option value="2">Remédios</option>
                                <option value="3">Higiene</option>
                                <option value="4">Material</option>
                                <option value="5">Eletrodomésticos</option>
                                <option value="6">Móveis</option>
                                <option value="7">Brinquedos</option>
                                <option value="8">Hositalares</option>
                                <option value="9">Terapeuticos</option>
                                <option value="10">Recursos</option>
                                <option value="11">Profissionais</option>
                                <option value="12">Outro</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">DATA DE PRECISÃO</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="dataPrecisao" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="+ NOVA NECESSIDADE" class="mr-3 btn btn-primary">
                    </div>
                </form>
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
                                                        <a href="{{route('entidade.pedido.excluir', ['idEntidade' => $entidade->id, 'idPedido' => $pedido->id])}}"><button class="btn btn-danger">Excluir</button></a>
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