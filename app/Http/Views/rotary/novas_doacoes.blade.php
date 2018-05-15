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
                            <h4>NOVAS DOAÇÕES</h4>
                        </div>
                        @php
                            $doadorDB = new \App\Http\Models\Doadores\DoadorRepository();
                            $pedidoDB = new \App\Http\Models\Pedidos\PedidosRepository();
                            $userDB = new \App\Http\Models\Users\UserRepository();
                        @endphp
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                    <tr>
                                        <th>Doador</th>
                                        <th>Produto</th>
                                        <th>Quatidade</th>
                                        <th>Data/Hora Busca</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{--dd($doacoes)--}}
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
                                            <td>
                                                <button type="button" class="btn-group btn-primary" data-toggle="modal" data-target="#modal_aprovar_{{$doacao->id}}" title="Aprovar">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                                <button type="button" class="btn-group btn-danger" data-toggle="modal" data-target="#modal_delete_{{$doacao->id}}" title="Excluir">
                                                    <i class="fa fa-trash"></i>
                                                </button>

                                                <button type="button" class="btn-group btn-common" data-toggle="modal" data-target="#modal_detalhes_{{$doacao->id}}" title="Detalhes">
                                                    <i class="fa fa-info-circle"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <div class="modal fade " id="modal_aprovar_{{$doacao->id}}" tabindex="-1" role="dialog" aria-labelledby="modal_aprovar">
                                            <div class="modal-dialog modal-dialog-centered " role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ul>
                                                            <li><strong>ID: </strong>{{$doacao->id}}</li>
                                                            <li><strong>Produto: </strong>{{$pedido->produto()->first()->nome}}</li>
                                                            <li><strong>Quantidade: </strong>{{$doacao->qtd_item . ' ' . $produto->unidade. '(s)'}}</li>
                                                            <li><strong>Doador: </strong>{{$doador->name}}</li>
                                                        </ul>
                                                        <h4 class="align-items-center">APROVAR A DOCAO COM AS INFORMAÇÕES ACIMA?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{route('rotary.doacao.aprovar', ['idDoacao' => $doacao->id])}}"><button class="btn btn-primary">APROVAR</button></a>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade " id="modal_delete_{{$doacao->id}}" tabindex="-1" role="dialog" aria-labelledby="modal_deletar">
                                            <div class="modal-dialog modal-dialog-centered " role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ul>
                                                            <li><strong>ID: </strong>{{$doacao->id}}</li>
                                                            <li><strong>Produto: </strong>{{$pedido->produto()->first()->nome}}</li>
                                                            <li><strong>Quantidade: </strong>{{$doacao->qtd_item . ' ' . $produto->unidade. '(s)'}}</li>
                                                            <li><strong>Doador: </strong>{{$doador->name}}</li>
                                                        </ul>
                                                        <h4 class="align-items-center">APAGAR A DOAÇÃO COM AS INFORMAÇÕES ACIMA?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{route('rotary.doacao.excluir', ['idDoacao' => $doacao->id])}}"><button class="btn btn-danger">APAGAR</button></a>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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