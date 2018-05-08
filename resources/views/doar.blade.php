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
	<?php
	$entidadeDB = new \App\Http\Models\Entidades\EntidadeRepository();
	$pedidosDB = new \App\Http\Models\Pedidos\PedidosRepository();
	$doadorDB = new \App\Http\Models\Doadores\DoadorRepository();
	$doacoes = $pedidosDB->getAllByDataPaginate();
	?>
	<div class="container">
		<div class="row">
			<h1 class="title">Doações</h1>
		
			<div class="container">
				<h3 class="centro">Aqui é possível visualizar as necessidades emergenciais das entidades cadastradas.</h3>            
				<table class="table table-hover table-striped">
					<thead>
						<tr class="bg-info">
							<th>Data</th>
							<th>Entidade</th>
							<th>Data Crítica <i class="fa fa-info-circle" title="Data onde já não será possível trabalhar sem o item."></i></th>
							<th>Necessidade</th>
							<th>Doação</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($doacoes as $doacao)
						<?php
						$produto = $doacao->produto()->first();
						$nomeNecessidade = $produto->qtd. ' ' . $produto->unidade . ' de ' . $produto->nome;
						date_default_timezone_set('America/Sao_Paulo');
						$hoje = new DateTime();
						$precisao = new DateTime($doacao->dataPrecisao);
						$diferenca = $precisao->diff($hoje);
						$entidade= $entidadeDB->getById($doacao->entidade_id);
						$classe = '';
						if(strcmp($doacao->status, 'Concluído') == 0){
							$classe = 'success';
						} else {
							if($diferenca->invert == 0){
								$classe = 'danger';
							} else {
								if($diferenca->days < 7)
									$classe = 'danger';
								if($diferenca->days >= 7 && $diferenca->days < 14)
									$classe = 'warning';
							}
						}
						?>
						<tr id="{{$doacao->id}}" class="{{$classe}}" onclick="minhaFuncao(this)">
							<td data-title="Data">{{\Carbon\Carbon::parse($doacao->created_at)->format('d/m/y')}}</td>
							<td data-title="Entidade">{{$entidade->name}}</td>
							<td data-title="Data Crítica">{{\Carbon\Carbon::parse($doacao->dataPrecisao)->format('d/m/y')}}</td>
							<td data-title="Necessidade">{{$nomeNecessidade}}</td>
							@if (Auth::guest())
								<td data-title="Doação"><button type="button" id="doabt01" class="btn btn-md btn-success" style="font-size: 10px" data-toggle="modal" data-target="#modalLogin">Logar para <br> Ajudar <i class="fa fa-heart faa-pulse animated"></i></button></td>
							@else
								<td data-title="Doação"><button type="button" id="doabt01" class="btn btn-md btn-success" data-toggle="modal" data-target="#modalDoar_{{$doacao->id}}">Ajudar <i class="fa fa-heart faa-pulse animated"></i></button></td>
							@endif

						</tr>
						{{--dd(Auth::guest())--}}
						@if (Auth::guest() == false)
								<!-- Modal Doar -->
						<div class="modal fade" id="modalDoar_{{$doacao->id}}" role="dialog">
							<div class="modal-dialog modal-md centro">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h3 class="modal-title">Doação para <b>{{$entidade->name}}</b></h3>
									</div>
									<div class="modal-body">
										<div class="container">
											<form role="form" action="{{route('doador.doacao.novo')}}" class="" method="post">
												<div class="col-md-6">
													{{ csrf_field() }}
													<input type="hidden" name="doadorId" value="{{$doadorDB->getByUserId(Auth::user()->id)->id}}">
													<input type="hidden" name="pedidoId" value="{{$doacao->id}}">
													<h3>Necessidade: <b>{{$nomeNecessidade}}</b></h3>
													<p>Data: {{\Carbon\Carbon::parse($doacao->created_at)->format('d/m/y')}} - Data Crítica: {{\Carbon\Carbon::parse($doacao->dataPrecisao)->format('d/m/y')}}</p>
															<!-- Text input-->
													<div class="form-group">
														<label class="col-md-2 control-label" for="qtd_item">Quant.</label>
														<div class="col-md-10">
															<input id="qtd_item" type="number" class="form-control input-lg fonte30" name="qtd_item" min="0" required>
															<span class="help-block">Quant. de <b>{{$produto->unidade}} de {{$produto->nome}}</b> que está doando.</span>
														</div>
													</div>
													<!-- Text input-->
													<div class="form-group">
														<label class="col-md-2 control-label" for="txt_data">Data</label>
														<div class="col-md-10">
															<input id="dataDisponivel" name="dataDisponivel" type="datetime-local" class="form-control input-lg fonte24" required>
															<span class="help-block">Melhor dia e hora para recolher a doação.</span>
														</div>
													</div>

													<div>
														<button type="submit" id="bt_confirmaDoacao" class="btn btn-lg btn-success">Confirmar Doação</button><div id="success" style="color:#34495e;"></div>
													</div>
												</div>
											</form>
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
				{!! $doacoes->links() !!}
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