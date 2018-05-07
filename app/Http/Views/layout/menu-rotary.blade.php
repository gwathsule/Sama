
<li><a href="{{route('admin.home')}}"> <i class="icon-home"></i>Home</a></li>

<h5 class="sidenav-heading">USERS</h5>
<li><a href="#addUsersDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-user-circle-o"></i>Entidades</a>
    <ul id="addUsersDropdown" class="collapse list-unstyled ">
        <li><a href="{{route('rotary.home.new.entidade')}}">Cadastrar</a></li>
        <li><a href="{{route('rotary.home.list.entidade')}}">Listar</a></li>
    </ul>
</li>
<li><a href="{{route('rotary.home.necessidades.novas')}}"> <i class="fa fa-hourglass"></i>Necessidades</a></li>
<li><a href="{{route('rotary.home.doacoes.novas')}}"> <i class="fa fa-heart-o"></i>Doações</a></li>
<li><a href="#"> <i class="fa fa-archive"></i>Estoque</a></li>