@extends('panel::layout.dash')
@section('title') Editar Entidade @endsection
@section('content')
    @include('panel::layout.errors')
    @include('panel::layout.success')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4>EDITAR ENTIDADE</h4>
            </div>
            <div class="card-body">
                @if(isset($entidade))
                    <form action="{{route('mediador.entidade.editar')}}"  method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{$entidade->id}}" name="id">
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">NOME</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nome" value="{{$entidade->name}}" placeholder="Nome do colaborador" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">EMAIL</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" value="{{$entidade->email}}" placeholder="email@email.com" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">CNPJ</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="cnpj" value="{{$entidade->cnpj}}" maxlength="14" placeholder="12345678000199" minlength="14" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">PRESIDENTE</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="presidente" value="{{$entidade->presidente}}" placeholder="Nome do presidente da entidade">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">FINALIDADE</label>
                            <div class="col-sm-10">
                                <textarea name="finalidade" placeholder="Descreva a finalidade da entidade" class="form-control" required>{{$entidade->finalidade}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">CONTATO</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="contato" value="{{$entidade->contato}}" placeholder="Nome da pessoa para contato na entidade" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">TELEFONE</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="telefone" value="{{$entidade->telefone}}" placeholder="2731201234" maxlength="10" minlength="10" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">CELULAR</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="celular" value="{{$entidade->celular}}" placeholder="27991234567" maxlength="11" minlength="10" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">CEP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="cep" value="{{$user->enderecos()->first()->cep}}" placeholder="29706410" maxlength="8" minlength="8" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">NÚMERO</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="numero" value="{{$user->enderecos()->first()->numero}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">RUA</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="logradouro" value="{{$user->enderecos()->first()->logradouro}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">BAIRRO</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="bairro" value="{{$user->enderecos()->first()->bairro}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">CIDADE</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="cidade" value="{{$user->enderecos()->first()->cidade}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">UF</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="uf" value="{{$user->enderecos()->first()->uf}}" maxlength="2" minlength="2" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">PAÍS</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="pais" value="{{$user->enderecos()->first()->pais}}" required>
                            </div>
                        </div>

                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">SENHA</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" placeholder="Caso não deseje alterar a senha, não digite nada neste campo" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">REPETIR SENHA</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password_confirmation" >
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                            <div class="col-sm-4 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Atualizar Informações</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection