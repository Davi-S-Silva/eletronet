@extends('admin.index')

@section('content')
    @php
        foreach ($contatos as $contato) {
            print_r($contato->nome);
            echo '<br/>';
        }
    @endphp
@endsection