{{--dd($errors)--}}
<div class="modal fade" id="modalLogin" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Login</h3>
            </div>
            <div class="modal-body">
                <div class="container">
                    <p>Entre com seu email e senha.</p>
                    <form role="form" class="" method="POST" action="{{ url('/login') }}">
                        <div class="col-md-6">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="controls">
                                    <input type="text" class="form-control" placeholder="Email" name="email" maxlength="40">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <input type="password" class="form-control email" placeholder="Senha" name="password" maxlength="20">
                                </div>
                            </div>
                            @if ($errors->getBag('default')->has('email'))
                                <h5 class="text-danger" style="font-weight: bold">Senha ou email incorreto. Por favor tente novamente.</h5>
                            @endif
                            <button type="submit" id="bt_entrar" class="btn btn-lg btn-common">Entrar <i class="fas fa-sign-in-alt"></i></button><div id="success" style="color:#34495e;"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-user"></i> Novo Cadastro</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>