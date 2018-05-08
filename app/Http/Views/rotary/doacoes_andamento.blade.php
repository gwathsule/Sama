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
                            <h4>DOAÇÕES EM ANDAMENTO</h4>
                        </div>
                        @php
                            $doadorDB = new \App\Http\Models\Doadores\DoadorRepository();
                            $pedidoDB = new \App\Http\Models\Pedidos\PedidosRepository();
                            $userDB = new \App\Http\Models\Users\UserRepository();
                        @endphp
                        <div class="card-body">
                            <form action="{{route('rotary.doacao.getByDoacaoFiltro')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <label class="col-sm-2 form-control-label">STATUS</label>
                                    <div class="col-sm-6 mb-3">
                                        <select name="status_doacao" class="form-control">
                                            <option value="todos">TODOS</option>
                                            <option value="aprovados">APROVADO (PRONTO PARA BUSCAR)</option>
                                            <option value="em_estoque">EM ESTOQUE</option>
                                            <option value="entregue">ENTREGUE</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 offset-sm-2">
                                        <button type="submit" class="btn btn-primary">Filtrar</button>
                                    </div>
                                </div>                                
                            </form>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                    <tr>
                                        <th>Doador</th>
                                        <th>Produto</th>
                                        <th>Quatidade</th>
                                        <th>Data/Hora Busca</th>
                                        <th>Status</th>
                                        <th>Marcar como</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($doacoes as $doacao)
                                        @php
                                            $doador = $doadorDB->getById($doacao->doador_id);
                                            $pedido = $pedidoDB->getById($doacao->pedido_id);
                                            $produto = $pedido->produto()->first();
                                            $user = $userDB->getById($doador->user_id);
                                            $endereco = $user->enderecos->first();
                                        @endphp
                                        <tr>
                                            <td>{{$doador->name}}</td>
                                            <td>{{$produto->nome}}</td>
                                            <td>{{$doacao->qtd_item . ' ' . $produto->unidade. '(s)'}}</td>
                                            <td>{{$doacao->dataDisponivel}}</td>
                                            <td>{{$doacao->status}}</td>
                                            <td>
                                                <a  href="{{route('rotary.doacao.aprovar', ['idDoacao' => $doacao->id])}}">
                                                    <button class="btn-group btn-default" title="Aprovado (pronto para buscar)">
                                                        <i class="fa fa-check-circle"></i>
                                                    </button>
                                                </a>

                                                <a href="{{route('rotary.doacao.marcarComoEstoque', ['idDoacao' => $doacao->id])}}" >
                                                    <button class="btn-group btn-warning" title="Em estoque">
                                                        <i class="fa fa-archive"></i>
                                                    </button>
                                                </a>

                                                <a href="{{route('rotary.doacao.marcarComoEntregue', ['idDoacao' => $doacao->id])}}" >
                                                    <button class="btn-group btn-primary" title="Entregue">
                                                        <i class="fa fa-car"></i>
                                                    </button>
                                                </a>

                                                <button type="button" class="btn-group btn-common" data-toggle="modal" data-target="#modal_detalhes_{{$doacao->id}}" title="Detalhes">
                                                    <i class="fa fa-info-circle"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <div class="modal fade " id="modal_detalhes_{{$doacao->id}}" tabindex="-1" role="dialog" aria-labelledby="modal_detalhes">
                                            <div class="modal-dialog modal-dialog-centered " role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ul>
                                                            <li><strong>Produto: </strong>{{$pedido->produto()->first()->nome}}</li>
                                                            <li><strong>Quantidade: </strong>{{$doacao->qtd_item . ' ' . $produto->unidade. '(s)'}}</li>
                                                            <li><strong>Doador: </strong>{{$doador->name}}</li>
                                                            <li><strong>Contato: </strong> Telefone: {{$doador->telefone}} | Celular: {{$doador->celular}}</li>
                                                            @if(strcmp($doador->tipo,'Fisica') == 0 )
                                                                <li><strong>Tipo: </strong>Pessoa Física</li>
                                                                <li><strong>CPF: </strong>{{$doador->cpf}}</li>
                                                            @else
                                                                <li><strong>Tipo: </strong>Pessoa Jurídica</li>
                                                                <li><strong>CNPJ: </strong>{{$doador->cnpj}}</li>
                                                                <li><strong>Contato: </strong>{{$doador->contato}}</li>
                                                            @endif
                                                            <li><strong>Cep: </strong>{{$endereco->cep}}</li>
                                                            <li><strong>Rua: </strong>{{$endereco->logradouro}}</li>
                                                            <li><strong>Numero: </strong>{{$endereco->numero}}</li>
                                                            <li><strong>Bairro: </strong>{{$endereco->bairro}}</li>
                                                            <li><strong>Cidade: </strong>{{$endereco->cidade}}</li>
                                                            <li><strong>UF: </strong>{{$endereco->uf}}</li>
                                                            <li><strong>País: </strong>{{$endereco->pais}}</li>
                                                        </ul>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
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