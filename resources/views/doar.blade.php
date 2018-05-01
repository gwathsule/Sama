<!DOCTYPE html>
<html lang="pt-br">
	<head>
		@include('layouts.head')
	</head>

    <body data-spy="scroll" data-offset="20" data-target="#navbar">
	@include('layouts.doar-menu')
  
	<!-- Modal Login -->
	@include('layouts.modalLogin')
	<!-- /Modal Login -->

	<!-- Modal Doar -->
	@include('layouts.modalDoar')
	<!-- /Modal Doar -->

	
	<!-- Doações Section -->
<section id="doacao">
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
						<tr id="1" class="danger" onclick="minhaFuncao(this)">
							<td>15/02/2018</td>
							<td>Centro de Acolhida</td>
							<td>19/03/2018</td>
							<td>1 professor de violão.</td>
							<td><button type="button" id="doabt01" class="btn btn-md btn-success" data-toggle="modal" data-target="#modalDoar">Ajudar <i class="fa fa-heart faa-pulse animated"></i></button></td>
						</tr>
						<tr id="2" class="danger" onclick="minhaFuncao(this)">
							<td>24/02/2018</td>
							<td>Centro de Acolhida</td>
							<td>15/03/2018</td>
							<td>Sabonete, Sabão, Pasta de dentes.</td>
							<td><button type="button" id="doabt02" class="btn btn-md btn-success" data-toggle="modal" data-target="#modalDoar">Ajudar <i class="fa fa-heart faa-pulse animated"></i></button></td>
						</tr>
						<tr id="3" class="danger" onclick="minhaFuncao(this)">
							<td>10/04/2018</td>
							<td>Asilo Vovô Simeão</td>
							<td>30/05/2018</td>
							<td>20 Litros de Leite</td>
							<td><button type="button" id="doabt03" class="btn btn-md btn-success" data-toggle="modal" data-target="#modalDoar">Ajudar <i class="fa fa-heart faa-pulse animated"></i></button></td>
						</tr>
						<tr id="1" class="success" onclick="minhaFuncao(this)">
							<td>10/02/2018</td>
							<td>Lar Pai Abraão</td>
							<td>30/02/2018</td>
							<td>1 Cadeira de Rodas</td>
							<td><i class="fa fa-check"></i> Concluído</td>
						</tr>
						<tr id="2" class="warning" onclick="minhaFuncao(this)">
							<td>24/02/2018</td>
							<td>Centro de Acolhida</td>
							<td>15/03/2018</td>
							<td>Sabonete, Sabão, Pasta de dentes.</td>
							<td><button type="button" id="doabt05" class="btn btn-md btn-success" data-toggle="modal" data-target="#modalDoar">Ajudar <i class="fa fa-heart faa-pulse animated"></i></button></td>
						</tr>
						<tr id="3" class="danger" onclick="minhaFuncao(this)">
							<td>10/04/2018</td>
							<td>Asilo Vovô Simeão</td>
							<td>30/05/2018</td>
							<td>20 Litros de Leite</td>
							<td><button type="button" id="doabt06" class="btn btn-md btn-success" data-toggle="modal" data-target="#modalDoar">Ajudar <i class="fa fa-heart faa-pulse animated"></i></button></td>
						</tr>
						<tr id="3" class="danger" onclick="minhaFuncao(this)">
							<td>10/04/2018</td>
							<td>Asilo Vovô Simeão</td>
							<td>30/05/2018</td>
							<td>20 Litros de Leite</td>
							<td><button type="button" id="doabt06" class="btn btn-md btn-success" data-toggle="modal" data-target="#modalDoar">Ajudar <i class="fa fa-heart faa-pulse animated"></i></button></td>
						</tr>
						<tr id="3" class="danger" onclick="minhaFuncao(this)">
							<td>10/04/2018</td>
							<td>Asilo Vovô Simeão</td>
							<td>30/05/2018</td>
							<td>20 Litros de Leite</td>
							<td><button type="button" id="doabt06" class="btn btn-md btn-success" data-toggle="modal" data-target="#modalDoar">Ajudar <i class="fa fa-heart faa-pulse animated"></i></button></td>
						</tr>
						<tr id="3" class="danger" onclick="minhaFuncao(this)">
							<td>10/04/2018</td>
							<td>Asilo Vovô Simeão</td>
							<td>30/05/2018</td>
							<td>20 Litros de Leite</td>
							<td><button type="button" id="doabt06" class="btn btn-md btn-success" data-toggle="modal" data-target="#modalDoar">Ajudar <i class="fa fa-heart faa-pulse animated"></i></button></td>
						</tr>
						<tr id="2" class="warning" onclick="minhaFuncao(this)">
							<td>24/02/2018</td>
							<td>Centro de Acolhida</td>
							<td>15/03/2018</td>
							<td>Sabonete, Sabão, Pasta de dentes.</td>
							<td><button type="button" id="doabt05" class="btn btn-md btn-success" data-toggle="modal" data-target="#modalDoar">Ajudar <i class="fa fa-heart faa-pulse animated"></i></button></td>
						</tr>
						<tr id="2" class="warning" onclick="minhaFuncao(this)">
							<td>24/02/2018</td>
							<td>Centro de Acolhida</td>
							<td>15/03/2018</td>
							<td>Sabonete, Sabão, Pasta de dentes.</td>
							<td><button type="button" id="doabt05" class="btn btn-md btn-success" data-toggle="modal" data-target="#modalDoar">Ajudar <i class="fa fa-heart faa-pulse animated"></i></button></td>
						</tr>
						<tr id="3" class="danger" onclick="minhaFuncao(this)">
							<td>10/04/2018</td>
							<td>Asilo Vovô Simeão</td>
							<td>30/05/2018</td>
							<td>20 Kg de Arroz</td>
							<td><button type="button" id="doabt06" class="btn btn-md btn-success" data-toggle="modal" data-target="#modalDoar">Ajudar <i class="fa fa-heart faa-pulse animated"></i></button></td>
						</tr>
						<tr id="3" class="danger" onclick="minhaFuncao(this)">
							<td>10/04/2018</td>
							<td>Asilo Vovô Simeão</td>
							<td>30/05/2018</td>
							<td>20 Litros de Leite</td>
							<td><button type="button" id="doabt03" class="btn btn-md btn-success" data-toggle="modal" data-target="#modalDoar">Ajudar <i class="fa fa-heart faa-pulse animated"></i></button></td>
						</tr>
						<tr id="1" class="success" onclick="minhaFuncao(this)">
							<td>10/02/2018</td>
							<td>Lar Pai Abraão</td>
							<td>30/02/2018</td>
							<td>1 Cadeira de Rodas</td>
							<td><i class="fa fa-check"></i> Concluído</td>
						</tr>
						<tr id="3" class="danger" onclick="minhaFuncao(this)">
							<td>10/04/2018</td>
							<td>Asilo Vovô Simeão</td>
							<td>30/05/2018</td>
							<td>20 Litros de Leite</td>
							<td><button type="button" id="doabt06" class="btn btn-md btn-success" data-toggle="modal" data-target="#modalDoar">Ajudar <i class="fa fa-heart faa-pulse animated"></i></button></td>
						</tr>
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
	</body>
</html>