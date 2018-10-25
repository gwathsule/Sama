@extends('panel::layout.dash')
@section('title') Cadastrar Mediador @endsection
@section('content')

    @include('panel::layout.errors')
    @include('panel::layout.success')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4>CADASTRO DE Mediador</h4>
            </div>
            <div class="card-body">
                <form action="{{route('admin.mediador.novo')}}"  method="post" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">NOME DO GRUPO</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nome_grupo" value="{{old('nome_grupo')}}" placeholder="Nome do grupo mediador" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">EMAIL</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="email@email.com" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">CPF</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="cpf" value="{{old('cpf')}}" maxlength="11" placeholder="12345678900" minlength="11">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">CNPJ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="cnpj" value="{{old('cnpj')}}" maxlength="14" placeholder="12345678900" minlength="14">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">CELULAR</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="celular" value="{{old('celular')}}" placeholder="27991234567" maxlength="11" minlength="11" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">TELEFONE</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="telefone" value="{{old('telefone')}}" placeholder="2731201234" maxlength="10" minlength="10" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">RESPONSÁVEL</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nome_responsavel" value="{{old('nome_responsavel')}}" placeholder="Nome do responsável" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">QUANTIDADE DE MEMBROS</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="quantidade_membros" value="{{old('quantidade_membros')}}" required>
                        </div>
                    </div>

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