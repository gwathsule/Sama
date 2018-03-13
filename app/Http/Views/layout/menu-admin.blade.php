
<li><a href="#"> <i class="icon-home"></i>Home</a></li>

<h5 class="sidenav-heading">USERS</h5>
<li><a href="#addUsersDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-user-plus"></i>Cadastro</a>
    <ul id="addUsersDropdown" class="collapse list-unstyled ">
        <li><a href="{{route('admin.home.new')}}">Rotariano</a></li>
        <li><a href="#">Entidade</a></li>
        <li><a href="#">Doador</a></li>
    </ul>
</li>
<li><a href="#listUsersDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-user-plus"></i>Listar</a>
    <ul id="listUsersDropdown" class="collapse list-unstyled ">
        <li><a href="{{route('admin.home.list')}}">Rotarianos</a></li>
        <li><a href="#">Entidades</a></li>
        <li><a href="#">Doadores</a></li>
    </ul>
</li>
<h5 class="sidenav-heading">Sistema</h5>
<li><a href="#"> <i class="fa fa-heart-o"></i>Doações</a></li>
<li><a href="#"> <i class="fa fa-heartbeat"></i>Necessidade</a></li>
<li><a href="#"> <i class="fa fa-archive"></i>Estoque</a></li>
