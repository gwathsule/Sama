@if (Auth::guest())
    <a href="#" data-toggle="modal" data-target="#modalLogin" ><i class="fas fa-sign-in-alt"></i> Login</a>
    <a href="#">Cadastre-se</a>
@else
    @if(strcmp(Auth::user()->tipo, 'Doador') == 0)
        <a href="#">Meus dados</a>
        <a href="#">Acompanhar doações</a>
        <a href="#">Nova Doação</a>
        <a href="{{url('doar')}}">Necessidades</a>
        <a href="{{url('/logout')}}"><i class="fas fa-sign-out-alt"></i> Sair</a>
        {{-- se o doador for empresa: <a href="#">Gerar certificado</a> --}}
    @else
        <a href="{{url('/logout')}}"><i class="fas fa-sign-out-alt"></i> Sair</a>
    @endif
@endif