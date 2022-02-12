@extends('layouts.index')

@section('title')
    Assine Já!
@endsection

@section('content')
    <form action="" method="POST" class="col-3">
        <header>
           Faça sua Assinatura agora mesmo.
        </header>
        @csrf
        <div class="col-12">
            <label for="">Nome Completo</label>
            <input class="form-control" type="text" name="Nome_Assinar" id="" placeholder="Digite seu Nome Completo">
        </div>
        <div class="col-12">
            <label for="">E-mail</label>
            <input class="form-control" type="email" name="Email_Assinar" id="" placeholder="Digite seu E-mail">
        </div>
        <div class="col-12">
            <label for="">Digite uma Senha</label>
            <input class="form-control" type="password" name="Senha_Assinar" id="" placeholder="Digita uma Senha">
        </div>
        <div class="col-12">
            <label for="">Confirme sua Senha</label>
            <input class="form-control" type="password" name="Confirma_Senha_Assinar" id="" placeholder="Confirme sua Senha">
        </div>
        <div class="col-12">
            <input class="btn btn-primary" type="button" name="Assinar" id="" value="Assinar">
        </div>
    </form>

@endsection
