@extends('layouts.index')

@section('title')
    Sobre Nossa Empresa
@endsection

@section('content')
    <form action="" method="POST" class="col-3">
        <header>
            Já é cliente?
        </header>
        @csrf
        <div class="col-12">
            <label for="">Faça login para continuar!</label>
            <input class="form-control" type="text" name="" id="" placeholder="Login">
        </div>
        <div class="col-12">
            <input class="form-control" type="password" name="" id="" placeholder="Senha">
        </div>
        <div class="col-12">
            <input class="btn btn-primary" type="button" name="" id="" value="Logar">
        </div>
        <div>
            <p>Ainda não é cliente? <a href="{{route('assinar')}}">Assinar</a></p>
        </div>
    </form>

@endsection
