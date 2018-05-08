<section id="doacao">
	<div class="container">
		<div class="row">
			<h1 class="title">Doações</h1>

			<?php
				$entidadeDB = new \App\Http\Models\Entidades\EntidadeRepository();
				$pedidosDB = new \App\Http\Models\Pedidos\PedidosRepository();
				$doadorDB = new \App\Http\Models\Doadores\DoadorRepository();
				$doacoes = $pedidosDB->getPrimeiras10DoacoesByData();
			?>

			<div class="container">
				<div class="row">
					<div class="centro">
						<h3>Aqui é possível visualizar as necessidades emergenciais das entidades cadastradas.</h3>
					</div>
					<div id="no-more-tables">
						<table class="col-md-12 table table-hover table-striped">
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
						<center><a href="{{url('doar')}}"><button type="button" class="btn btn-lg btn-warning"><i class="fa fa-list faa-tada animated"></i> Listar Todas...</button></a></center>
					</div>
				</div>
			</div>
			
			
			
				
			<h3 class="subtitle">Confira algumas entregas de doações</h3>

			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="portfolio-item wow fadeInLeft" data-wow-delay=".5s">
					<a href="#"><img src="http://rotarycolatinariodoce.com.br/fotos/asilo.jpg" alt=""></a>
					<div class="overlay">
						<div class="icons">
							<a data-lightbox="image1" href="http://rotarycolatinariodoce.com.br/fotos/asilo.jpg" class="preview"><i class="fa fa-search-plus fa-4x"></i></a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="portfolio-item wow fadeInLeft" data-wow-delay=".7s">
					<a href="#"><img src="http://rotarycolatinariodoce.com.br/fotos/40004cc436e7de21b29c2fa81ad11740.jpg" alt=""></a>
					<div class="overlay">
						<div class="icons">
							<a data-lightbox="image1" href="http://rotarycolatinariodoce.com.br/fotos/40004cc436e7de21b29c2fa81ad11740.jpg" class="preview"><i class="fa fa-search-plus fa-4x"></i></a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="portfolio-item wow fadeInLeft" data-wow-delay=".9s">
					<a href="#"><img src="http://rotarycolatinariodoce.com.br/fotos/8e16fd6b664adb009a3090ad9fc516cb.jpg" alt=""></a>
					<div class="overlay">
						<div class="icons">
							<a data-lightbox="image1" href="http://rotarycolatinariodoce.com.br/fotos/8e16fd6b664adb009a3090ad9fc516cb.jpg" class="preview"><i class="fa fa-search-plus fa-4x"></i></a>
						</div>
					</div>
				</div>
			</div>

			<center><a href="#doacao" class="btn btn-common btn-lg">Doe Agora!</a></center>  
		</div>
	</div>
</section>