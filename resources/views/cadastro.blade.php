<!DOCTYPE html>
<html lang="pt-br">
<head>
    @include('layouts.head')
    <style>
        .center_div{
            margin: 0 auto;
            width:50% /* value of your choice which suits your alignment */
        }
    </style>
</head>

<body data-spy="scroll" data-offset="20" data-target="#navbar">
@include('layouts.menu-externo')

<!-- Modal Login -->
@include('layouts.modalLogin')
<!-- /Modal Login -->

<!-- Modal Doar -->
@include('layouts.modalDoar')
<!-- /Modal Doar -->


<!-- Doações Section -->
<section id="cadastro">
    <div class="container">
        <div class="row center_div">
            <h4 class="subtitle">ENTRE COM AS INFORMAÇÕES NECESSÁRIAS :)</h4>
            <div class="container">
                <form action="{{route('doador.cadastro')}}" class="" method="post">
                    <div class="col-md-6">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="controls">
                                <input name="email" style="display:none">
                                <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="{{old('email')}}" maxlength="40" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="controls">
                                <input name="celular" style="display:none">
                                <input type="text" class="form-control" placeholder="Celular" id="celular" name="celular" value="{{old('celular')}}" maxlength="40" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="controls">
                                <input name="telefone" style="display:none">
                                <input type="text" class="form-control" placeholder="Telefone" id="telefone" name="telefone" value="{{old('telefone')}}" maxlength="40" autocomplete="off" required>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <input id="tipoPessoaFisica" onchange="showInfoPessoaFisica()" name="tipoPessoa" value="pessoaFisica" type="radio" checked="" />
                            <label for="PessoaFisica" >Pessoa Física</label>

                            <input id="tipoPessoaJuridica" onchange="showInfoPessoaJuridica()" name="tipoPessoa" value="pessoaJuridica" type="radio" />
                            <label for="PessoaJuridica" >Pessoal Jurídida (empresa)</label>
                        </div>

                        <div id="infoPessoaFisica">
                            <div class="form-group">
                                <div class="controls">
                                    <input name="nome" style="display:none">
                                    <input type="text" class="form-control" placeholder="Nome completo" id="nome" name="nome" value="{{old('nome')}}" maxlength="100" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="controls">
                                    <input name="cpf" style="display:none">
                                    <input type="text" class="form-control" placeholder="CPF do titular" id="cpf" name="cpf" value="{{old('cpf')}}" maxlength="100" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div id="infoPessoaJuridica" style="display: none;">
                            <div class="form-group">
                                <div class="controls">
                                    <input name="razao" style="display:none">
                                    <input type="text" class="form-control" placeholder="Nome da empresa" id="razao" name="razao" value="{{old('razao')}}" maxlength="11" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="controls">
                                    <input name="cnpj" style="display:none">
                                    <input type="text" class="form-control" placeholder="CNPJ da empresa" id="cnpj" name="cnpj" value="{{old('cnpj')}}" maxlength="14" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="controls">
                                    <input type="file" accept="image/*" class="form-control" placeholder="Selecione uma logotipo" id="logotipo" name="logotipo" value="{{old('logotipo')}}">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <div class="controls">
                                <input name="cep" style="display:none">
                                <input type="text" class="form-control" placeholder="CEP" id="cep" name="cep" value="{{old('cep')}}" maxlength="8" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="controls">
                                <input name="rua" style="display:none">
                                <input type="text" class="form-control" placeholder="Nome da rua" id="rua" name="rua" value="{{old('rua')}}" maxlength="255" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="controls">
                                <input name="numero" style="display:none">
                                <input type="number" class="form-control" placeholder="Número da resodência" id="numero" value="{{old('numero')}}" name="numero" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="controls">
                                <input name="bairro" style="display:none">
                                <input type="text" class="form-control" placeholder="Nome do bairro" id="bairro" name="bairro" value="{{old('bairro')}}" maxlength="255" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <input name="cidade" style="display:none">
                                <input type="text" class="form-control" placeholder="Nome da cidade" id="cidade" name="cidade" value="{{old('cidade')}}" maxlength="255" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="controls">
                                <input name="uf" style="display:none">
                                <input type="text" class="form-control" placeholder="UF" id="uf" name="uf" value="{{old('uf')}}" maxlength="2" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="controls">
                                <input name="pais" style="display:none">
                                <input type="text" class="form-control" placeholder="País" id="pais" name="pais" value="{{old('pais')}}" maxlength="255" autocomplete="off" required>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <div class="controls">
                                <input type="password" class="form-control" autocomplete="new-password" placeholder="Senha" name="password" maxlength="20" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="controls">
                                <input type="password" class="form-control" autocomplete="new-password" placeholder="Repita a senha" name="password_confirmation" maxlength="20" required>
                            </div>
                        </div>

                        @if ($errors->getBag('default')->has('email'))
                            <h5 class="text-danger" style="font-weight: bold">Senha ou email incorreto. Por favor tente novamente.</h5>
                        @endif
                        <button type="submit" id="bt_entrar" class="btn btn-lg btn-common">Cadastrar <i class="fas fa-sign-in-alt"></i></button><div id="success" style="color:#34495e;"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /Doações Section End -->

<!-- Copyright Section -->
<div id="copyright">
    <div class="container">
        <div class="col-md-10"><p>© Projeto SAMA 2018 All right reserved. Design & Developed by <a href="#">Cezar / Rafael</a><br>Rotary Club Colatina Rio Doce</p></div>
        <div class="col-md-2">
            <span class="to-top pull-right"><a href="#hero-area"><i class="fa fa-angle-up fa-2x"></i></a></span>
        </div>
    </div>
</div>
<!-- Copyright Section End -->

<!-- Bootstrap JS -->
<script src="{{asset('assets/site/js/bootstrap.min.js')}}"></script>

<!-- Smooth Scroll -->
<script src="{{asset('assets/site/js/smooth-scroll.js')}}"></script>
<script src="{{asset('assets/site/js/lightbox.min.js')}}"></script>
<!-- WOW -->
<script src="{{asset('assets/site/js/wow.js')}}"></script>
<script>new WOW().init();</script>

<!-- All JS plugin Triggers -->
<script src="{{asset('assets/site/js/main.js')}}"></script>

<!-- JS Formulário -->
<script type="text/javascript" src="{{asset('assets/site/js/form/jquery-1.10.2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/site/js/form/jquery.maskedinput.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/site/js/form/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/site/js/form/jquery.zebra-datepicker.js')}}"></script>

<!-- JS Page -->
<script>
    function showInfoPessoaFisica(){
        document.getElementById('infoPessoaFisica').style.display ='block';
        document.getElementById('infoPessoaJuridica').style.display ='none';
    }
    function showInfoPessoaJuridica(){
        document.getElementById('infoPessoaJuridica').style.display = 'block';
        document.getElementById('infoPessoaFisica').style.display = 'none';
    }
</script>

</body>
</html>