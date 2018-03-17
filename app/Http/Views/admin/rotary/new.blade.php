@extends('panel::layout.dash')
@section('title') Cadastrar Rotariano @endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4>CADASTRO DE ROTARIANO</h4>
            </div>
            <div class="card-body">
                <form action="{{route('admin.rotary.novo')}}"  method="post" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">NOME</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nome" placeholder="Nome do colaborador" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">EMAIL</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" placeholder="email@email.com" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">CPF</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="cpf" maxlength="11" placeholder="12345678900" minlength="11" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">CELULAR</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="celular" placeholder="27991234567" maxlength="11" minlength="10" required>
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
                            <input type="password" class="form-control" name="repeat_password" required>
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