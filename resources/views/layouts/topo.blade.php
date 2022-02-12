@section('topo')
    <header class="col-12 topo">
        <figure class="">
            <a href="/"><img src="{{ asset('site/imagens/layout/logo.png') }}" alt="Logo da empresa" srcset=""></a>
        </figure>

        <div>
            <ul class="">
                <li class="btn_assinante"><a href="assinante"><i class="fa-regular fa-circle-user"></i> Área do Assinante</a>
                </li>
            </ul>
        </div>
            @include('layouts.menu')
    </header>
@show
