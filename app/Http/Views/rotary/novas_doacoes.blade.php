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
                                        <th>Produto</th>
                                        <th>Doador</th>
                                        <th>Data/Hora Busca</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($doacoes as $doacao)
                                        @php
                                            $necessidade =
                                        @endphp
                                        <tr>
                                            <th scope="row">{{$doacao->id}}</th>
                                            <td>{{$doacao->produto()->first()->nome}}</td>
                                            <td>{{$doacao->produto()->first()->qtd .  ' ' . $doacao->produto()->first()->unidade}}</td>
                                            <td>{{$doacao->dataPrecisao}}</td>
                                            <td>
                                                <button type="button" class="btn-group btn-primary" data-toggle="modal" data-target="#modal_aprovar_{{$doacao->id}}" title="Aprovar">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                                <button type="button" class="btn-group btn-dark" data-toggle="modal" data-target="#modal_desaprovar_{{$doacao->id}}" title="Não Aprovar">
                                                    <i class="fa fa-ban"></i>
                                                </button>
                                                <button type="button" class="btn-group btn-danger" data-toggle="modal" data-target="#modal_delete_{{$doacao->id}}" title="Excluir">
                                                    <i class="fa fa-trash"></i>
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
                                                            <li><strong>Produto: </strong>{{$doacao->produto()->first()->nome}}</li>
                                                        </ul>
                                                        <h4 class="align-items-center">APROVAR A NECESSIDADE COM AS INFORMAÇÕES ACIMA?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{route('rotary.doacao.aprovar', ['iddoacao' => $doacao->id])}}"><button class="btn btn-primary">APROVAR</button></a>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade " id="modal_desaprovar_{{$doacao->id}}" tabindex="-1" role="dialog" aria-labelledby="modal_aprovar">
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
                                                            <li><strong>Produto: </strong>{{$doacao->produto()->first()->nome}}</li>
                                                        </ul>
                                                        <h4 class="align-items-center">NÃO APROVAR A NECESSIDADE COM AS INFORMAÇÕES ACIMA?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{route('rotary.doacao.desaprovar', ['iddoacao' => $doacao->id])}}"><button class="btn btn-danger">NÃO APROVAR</button></a>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade " id="modal_delete_{{$doacao->id}}" tabindex="-1" role="dialog" aria-labelledby="modal_aprovar">
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
                                                            <li><strong>Produto: </strong>{{$doacao->produto()->first()->nome}}</li>
                                                        </ul>
                                                        <h4 class="align-items-center">APAGAR A NECESSIDADE COM AS INFORMAÇÕES ACIMA?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{route('rotary.doacao.excluir', ['iddoacao' => $doacao->id])}}"><button class="btn btn-danger">APAGAR</button></a>
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