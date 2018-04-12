
<li><a href="{{route('admin.home')}}"> <i class="icon-home"></i>Home</a></li>

<h5 class="sidenav-heading">USERS</h5>
<li><a href="#addUsersDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-user-circle-o"></i>Entidades</a>
    <ul id="addUsersDropdown" class="collapse list-unstyled ">
        <li><a href="{{route('rotary.home.new.entidade')}}">Cadastrar</a></li>
        <li><a href="{{route('rotary.home.list.entidade')}}">Listar</a></li>
    </ul>
</li>

<h5 class="sidenav-heading">SISTEMA</h5>
<li><a href="#addUsersDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-product-hunt"></i>Entidades</a>
    <ul id="addUsersDropdown" class="collapse list-unstyled ">
        <li><a href="{{route('rotary.home.new.produto')}}">Cadastrar</a></li>
        <li><a href="{{route('rotary.home.list.produtos')}}">Listar</a></li>
    </ul>
</li>
<li><a href="#"> <i class="fa fa-heart-o"></i>Doações</a></li>
<li><a href="#"> <i class="fa fa-heartbeat"></i>Necessidade</a></li>
<li><a href="#"> <i class="fa fa-archive"></i>Estoque</a></li>