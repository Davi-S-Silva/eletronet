@section('topo')
    <header class="col-12 topo">
        <figure class="col-3">
            <a href="/"><img src="{{asset('site/imagens/layout/logo.png')}}" alt="Logo da empresa" srcset=""></a>
        </figure>
        <nav class="col-sm-9 col-md-5">            
            @include('layouts.menu')
        </nav>
    </header>
@show
