@section('menu')
<nav class="">
    <ul class="">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="sobre">Sobre</a></li>
        <li><a href="/#Planos">Planos</a></li>
        <li><a href="/#Servicos">Serviços</a></li>
        <li><a href="">Canais</a>
            {{-- <ul>
                <li><a href="auto_atendimento">Auto atendimento</a></li>
                <li><a href="sugestao">Pesquisa de satisfação</a></li>
                <li><a href="#Duvidas">duvidas frequentes</a></li>
            </ul> --}}
        </li>
        <li><a href="cobertura">Cobertura</a></li>
        <li><a href="contato">Contato</a></li>
    </ul>
    @if (session('UsuarioLogado'))
        <ul class="ul_btn_admin">
            <li class="btn_admin"><a href="admin" target="_blank">Admin</a></li>
        </ul>
    @endif
</nav>
@show
