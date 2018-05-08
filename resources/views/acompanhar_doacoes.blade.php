<!DOCTYPE html>
<html lang="pt-br">
<head>
    @include('layouts.head')
</head>

<body data-spy="scroll" data-offset="20" data-target="#navbar">
@include('layouts.menu-externo')

<!-- Modal Login -->
@include('layouts.modalLogin')
<!-- /Modal Login -->

<!-- Modal Doar -->
@include('layouts.modalDoar')
<!-- /Modal Doar -->

<!-- Modal Sucesso -->
@include('layouts.success')
<!-- /Modal Sucesso -->

<!-- Doações Section -->
<section id="doacao">
    <div class="container">
        <div class="row">
            <h1 class="title">Doações</h1>
            <?php
            $entidadeDB = new \App\Http\Models\Entidades\EntidadeRepository();
            $pedidosDB = new \App\Http\Models\Pedidos\PedidosRepository();
            ?>
            <div class="container">
                <h4 class="centro">Aqui é possível visualizar suas doações realizadas no site e o andamento de cada uma delas.</h4>
                <table class="table table-hover table-striped">
                    <thead>
                    <tr class="bg-info">
                        <th>Data</th>
                        <th>Produto doado</th>
                        <th>Entidade</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($doacoes as $doacao)
                        @php
                            $necessidade = $pedidosDB->getById($doacao->pedido_id);
                            $produto = $necessidade->produto()->first();
                            $entidade = $entidadeDB->getById($necessidade->entidade_id);
                            $nomeNecessidade = $doacao->qtd_item. ' ' . $produto->unidade . ' de ' . $produto->nome;
                        @endphp
                        <tr class="">
                            <td data-title="Data">{{\Carbon\Carbon::parse($doacao->created_at)->format('d/m/y')}}</td>
                            <td data-title="Produto doado">{{$nomeNecessidade}}</td>
                            <td data-title="Entidade">{{$entidade->name}}</td>
                            <td data-title="Status">{{$doacao->status}}</td>
                            <td data-title="Doação"><button type="button" id="doabt01" class="btn btn-md btn-success" data-toggle="modal" data-target="#modalDetalhes_{{$doacao->id}}">Delathes <i class="fa fa-info-circle"></i></button></td>
                        </tr>
                        {{--dd(Auth::guest())--}}
                        @if (Auth::guest() == false)
                            <!-- Modal Doar -->
                            <div class="modal fade" id="modalDetalhes_{{$doacao->id}}" role="dialog">
                                <div class="modal-dialog modal-md centro">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h3 class="modal-title">Doação para <b>{{$entidade->name}}</b></h3>
                                        </div>
                                        <div class="modal-body">
                                            <div class="">
                                                <ul>
                                                    <li><b>Data de busca: </b> {{\Carbon\Carbon::parse($doacao->dataDisponivel)->format('d/m/y')}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Modal Doar -->
                        @endif
                    @endforeach
                    </tbody>
                </table>
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

<script>
    $( document ).ready(function() {
        document.getElementById("btn_modal_sucess").click();
    });
</script>

</body>
</html>