@extends('panel::layout.dash')
@section('title') Cadastrar Entidade @endsection
@section('content')

    @include('panel::layout.errors')
    @include('panel::layout.success')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4>CADASTRO DE ENTIDADES</h4>
            </div>
            <div class="card-body">
                <form action="{{route('rotary.entidade.novo')}}"  method="post" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">NOME</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nome" value="{{old('nome')}}" placeholder="Nome do colaborador" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">EMAIL</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="email@email.com" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">CNPJ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="cnpj" value="{{old('cnpj')}}" maxlength="14" placeholder="12345678000199" minlength="14" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">PRESIDENTE</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="presidente" value="{{old('presidente')}}" placeholder="Nome do presidente da entidade">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">FINALIDADE</label>
                        <div class="col-sm-10">
                            <textarea name="finalidade" placeholder="Descreva a finalidade da entidade" class="form-control" required>{{old('finalidade')}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">CONTATO</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="contato" value="{{old('contato')}}" placeholder="Nome da pessoa para contato na entidade" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">TELEFONE</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="telefone" value="{{old('telefone')}}" placeholder="2731201234" maxlength="10" minlength="10" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">CELULAR</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="celular" value="{{old('celular')}}" placeholder="27991234567" maxlength="11" minlength="10" required>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">CEP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="cep" value="{{old('cep')}}" placeholder="29706410" maxlength="8" minlength="8" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">NÚMERO</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="numero" value="{{old('numero')}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">RUA</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="rua" value="{{old('rua')}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">BAIRRO</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="bairro" value="{{old('bairro')}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">CIDADE</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="cidade" value="{{old('cidade')}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">UF</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="uf" value="{{old('uf')}}" maxlength="2" minlength="2" required>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">SENHA</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">REPETIR SENHA</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                        <div class="col-sm-4 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Salvar Usuário</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection