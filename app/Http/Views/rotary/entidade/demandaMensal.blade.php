@extends('panel::layout.dash')
@section('title') Listar Entidades @endsection
@section('content')

    @include('panel::layout.errors')
    @include('panel::layout.success')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                @if(sizeof($entidade->demandaMensal()->get()) == 0)
                    <h4>CADASTRAR NOVA DEMANDA MENSAL</h4>
                @else
                    <h4>DEMANDA MENSAL</h4>
                @endif
            </div>

            <div class="card-body">
                @if(sizeof($entidade->demandaMensal()->get()) == 0)
                    <form action="{{route('rotary.entidade.novaDemanda')}}"  method="post" class="form-horizontal">
                        <p>A Entidade <b>{{$entidade->name}}</b> não possui uma demanda mensal cadastrada, deseja criar uma agora?</p>
                        <hr>
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$entidade->id}}">
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">FINALIDADE</label>
                            <div class="col-sm-10">
                                <textarea name="observacao" maxlength="2000" placeholder="Há alguma observação ao criar uma demanda mensal para esta entidade?" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 offset-sm-2">
                                <button type="submit" class="btn btn-primary">CRIAR DEMANDA</button>
                            </div>
                        </div>
                    </form>
                @else
                    <form class="form-control-lg" action="{{route('rotary.entidade.demanda.novoProduto')}}"  method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <input type="hidden" name="idEntidade" value="{{$entidade->id}}">

                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">NOME</label>
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

                        <div class="form-group">
                            <input type="submit" value="Cadastrar novo produto" class="mr-3 btn btn-primary">
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
                                        <th>Nome</th>
                                        <th>Quantidade</th>
                                        <th>Unidade</th>
                                        <th>Categoria</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($entidade->demandaMensal()->first()->produtos()->get() as $produto)
                                        <tr>
                                            <th scope="row">{{$produto->id}}</th>
                                            <td>{{$produto->nome}}</td>
                                            <td>{{$produto->qtd}}</td>
                                            <td>{{$produto->unidade}}</td>
                                            <td>{{$produto->categoria}}</td>
                                            <td>
                                                <button type="button" class="btn-danger" data-toggle="modal" data-target="#modal_delete_{{$produto->id}}" title="Excluir">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <div class="modal fade " id="modal_delete_{{$produto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
                                            <div class="modal-dialog modal-dialog-centered " role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ul>
                                                            <li><strong>ID: </strong>{{$produto->id}}</li>
                                                            <li><strong>Nome: </strong>{{$produto->nome}}</li>
                                                        </ul>
                                                        <h4 class="align-items-center">EXCLUIR O PRODUTO COM AS INFORMAÇÕES ACIMA?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{route('rotary.entidade.demanda.excluirProduto', ['idEntidade' => $entidade->id, 'idProduto' => $produto->id])}}"><button class="btn btn-danger">Excluir</button></a>
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
            @endif
        </div>
    </div>
@endsection