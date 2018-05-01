<!DOCTYPE html>
<html lang="pt-br">
	<head>
        @include('layouts.head')
	</head>

    <body data-spy="scroll" data-offset="20" data-target="#navbar">
    @include('layouts.menu')
	<!-- Hero Area Section -->
	@include('layouts.hero')
	<!-- /Hero Area Section End-->
  
	<!-- Modal Login -->
    @include('layouts.modalLogin')
	<!-- /Modal Login -->

	<!-- Oque é.. Section -->
    @include('layouts.oqueE')
	<!-- /Oque é.. Section End -->

	<!-- Modal Doar -->
    @include('layouts.modalDoar')
	<!-- /Modal Doar -->
	
	<!-- Doações Section -->
    @include('layouts.doacoes')
	<!-- /Doações Section End -->

	<!-- Parceiros Section -->
    @include('layouts.parceiros')
	<!-- Parceiros Section End -->


	<!-- Quem Somos Section -->

    <section id="about">
    <div class="container">
    <div class="row">
    <h1 class="title">O projeto</h1>
    <h2 class="subtitle"></h2>

    <div class="col-md-8 col-sm-12">
    <p>
    O projeto SAMA foi idealizado por um grupo de jovens que faziam parte do Rotaract, que é um grupo pertencente ao Rotary que tem como seus participantes jovens. O projeto não saiu naquela época porém graças a parceria feita com alunos formandos do curso de Sistemas de Informação do Institudo Federal do Espírito Santo (IFES), o projeto saiu do papel e juntamente com o Rotary Club Colatina Rio Doce fazem todo o trabalho de logística e divulgação do projeto.
    </p>
	<br>

    </div>

	<img class="col-md-4 col-md-4 col-sm-12 col-xs-12  wow fadeInRight" data-wow-delay=".9s" src="https://rotarybragancaestancia.com.br/wp-content/uploads/2017/05/cropped-roda-dentada-amarela.png" alt="">

	<div class="col-md-12 col-sm-12 wow fadeInDown" data-wow-delay="5s">
		<h2 class="centro italico">"Um pequeno sopro pode ser capaz de movimentar várias vidas!"</h2>
	</div>
    
	<div class="col-md-8 col-sm-12">
    </div>
    </div>
    </div>
    </section>
	<!-- Quem Somos Section End -->



	<!-- Contato Section -->
    @include('layouts.contato')
	<!-- /Contato Section End-->

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
        <script src="{{asset('/assets/site/js/bootstrap.min.js')}}"></script>

        <!-- Smooth Scroll -->
        <script src="{{asset('/assets/site/js/smooth-scroll.js')}}"></script>

        <script src="{{asset('/assets/site/js/lightbox.min.js')}}"></script>

        <!-- WOW -->
		<script src="{{asset('/assets/site/js/wow.js')}}"></script>

		<script>new WOW().init();</script>

        <!-- All JS plugin Triggers -->
        <script src="{{asset('/assets/site/js/main.js')}}"></script>

        @if ($errors->getBag('default')->has('email'))
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#modalLogin').modal('show');
                })
            </script>
        @endif
	</body>
</html>