@extends('panel::layout.dash')
@section('title') Editar Rotariano @endsection
@section('content')
    @include('panel::layout.errors')
    @include('panel::layout.success')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4>EDITAR ROTARIANO</h4>
            </div>
            <div class="card-body">
                @if(isset($usuario))
                    <form action="{{route('admin.rotary.editar')}}"  method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{$usuario->id}}" name="id">
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">NOME</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nome" value="{{$usuario->name}}" placeholder="Nome do colaborador">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">EMAIL</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" value="{{$usuario->email}}" placeholder="email@email.com">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">CPF</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="cpf" value="{{$usuario->cpf}}" maxlength="11" placeholder="12345678900" minlength="11">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">CELULAR</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="celular" value="{{$usuario->celular}}" placeholder="27991234567" maxlength="11" minlength="10">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">SENHA</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="Caso não deseje alterar a senha, não digite nada neste campo" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label">REPETIR SENHA</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password_confirmation">
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