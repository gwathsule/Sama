<section id="doacao">
	<div class="container">
		<div class="row">
			<h1 class="title">Doações</h1>
			
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
								<tr id="1" class="danger" onclick="minhaFuncao(this)">
									<td data-title="Data">15/02/2018</td>
									<td data-title="Entidade">Centro de Acolhida</td>
									<td data-title="Data Crítica">19/03/2018</td>
									<td data-title="Necessidade">1 professor de violão.</td>
									<td data-title="Doação"><button type="button" id="doabt01" class="btn btn-md btn-success" data-toggle="modal" data-target="#modalDoar">Ajudar <i class="fa fa-heart faa-pulse animated"></i></button></td>
								</tr>
								<tr id="2" class="danger" onclick="minhaFuncao(this)">
									<td data-title="Data">24/02/2018</td>
									<td data-title="Entidade">Centro de Acolhida</td>
									<td data-title="Data Crítica">15/03/2018</td>
									<td data-title="Necessidade">Sabonete, Sabão, Pasta de dentes.</td>
									<td><button type="button" id="doabt02" class="btn btn-md btn-success" data-toggle="modal" data-target="#modalDoar">Ajudar <i class="fa fa-heart faa-pulse animated"></i></button></td>
								</tr>
								<tr id="3" class="danger" onclick="minhaFuncao(this)">
									<td data-title="Data">10/04/2018</td>
									<td data-title="Entidade">Asilo Vovô Simeão</td>
									<td data-title="Data Crítica">30/05/2018</td>
									<td data-title="Necessidade">20 Litros de Leite</td>
									<td><button type="button" id="doabt03" class="btn btn-md btn-success" data-toggle="modal" data-target="#modalDoar">Ajudar <i class="fa fa-heart faa-pulse animated"></i></button></td>
								</tr>
								<tr id="1" class="success" onclick="minhaFuncao(this)">
									<td data-title="Data">10/02/2018</td>
									<td data-title="Entidade">Lar Pai Abraão</td>
									<td data-title="Data Crítica">30/02/2018</td>
									<td data-title="Necessidade">1 Cadeira de Rodas</td>
									<td><i class="fa fa-check"></i> Concluído</td>
								</tr>
								<tr id="2" class="warning" onclick="minhaFuncao(this)">
									<td data-title="Data">24/02/2018</td>
									<td data-title="Entidade">Centro de Acolhida</td>
									<td data-title="Data Crítica">15/03/2018</td>
									<td data-title="Necessidade">Sabonete, Sabão, Pasta de dentes.</td>
									<td><button type="button" id="doabt05" class="btn btn-md btn-success" data-toggle="modal" data-target="#modalDoar">Ajudar <i class="fa fa-heart faa-pulse animated"></i></button></td>
								</tr>
								<tr id="3" class="danger" onclick="minhaFuncao(this)">
									<td data-title="Data">10/04/2018</td>
									<td data-title="Entidade">Asilo Vovô Simeão</td>
									<td data-title="Data Crítica">30/05/2018</td>
									<td data-title="Necessidade">20 Litros de Leite</td>
									<td><button type="button" id="doabt06" class="btn btn-md btn-success" data-toggle="modal" data-target="#modalDoar">Ajudar <i class="fa fa-heart faa-pulse animated"></i></button></td>
								</tr>
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