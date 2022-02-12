<div class="list_clientes_include_view">
{{-- {{dd($clientes)}} --}}
<ul class="list_clientes">
    @foreach ($clientes as $item)
        <li>{{$item['nome']}} - <i class="fa-brands fa-whatsapp"></i></li>
    @endforeach
</ul>
    <hr>
</div>
