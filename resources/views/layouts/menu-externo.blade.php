<div class="logo-menu">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" data-spy="affix" data-offset-top="50">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header col-md-3">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#home"> <img src="{{asset('/assets/site/img/topo/icone_branco.png')}}" class="faa-spin animated faa-slow" alt=""> SAMA</a>
            </div>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav col-md-9 pull-right">
                    <li class="active"><a href="{{url('/')}}"><i class="fa fa-home"></i> Início</a></li>
                    <li><a href="{{url('/')}}#services"><i class="fa fa-question-circle"></i> O que é</a></li>
                    <li><a href="{{url('/')}}#doacao"><i class="fa fa-heart"></i> Doações</a></li>
                    <li><a href="{{url('/')}}#clients"><i class="fa fa-puzzle-piece"></i> Parceiros</a></li>
                    <li><a href="{{url('/')}}#about"><i class="fa fa-info"></i> O projeto</a></li>
                    <li><a href="{{url('/')}}#contact"><i class="fa fa-envelope"></i> Contato</a></li>
                    <li>
                        <div class="dropdown">
                            <button class="dropbtn"> <i class="fas fa-user"> </i> Doador</button>
                            <div class="dropdown-content">
                                @include('layouts.menu-user')
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>