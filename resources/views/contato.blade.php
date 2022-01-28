@extends('layouts.index')

@section('title')
    Entre em Contato
@endsection

@section('content')
    <section class="contato">
        <figure>
            <img src="{{asset('site/imagens/layout/fale_conosco.jpg')}}" alt="#">
        </figure>
        <form action="" method="post" class="col-xl-4s col-lg-4 col-md-8 col-sm-10 col-12">
            <header>
                Fale Conosco!
            </header>
            <div>
                <label for="">Nome</label>
                <input type="text" class="form-control" name="Nome" id="">
            </div>
            <div>
                <label for="">E-mail</label>
                <input type="email" class="form-control" name="Email" id="">
            </div>
            <div>
                <label for="">Mensagem</label>
                <textarea name="Mensagem" class="form-control" id="" cols="20" rows="5"></textarea>
            </div>
            <div>
                <input type="reset" class="btn btn-secondary"  value="Limpar">
                <input type="submit" class="btn btn-primary" Value="Enviar" id="">
            </div>
        </form>
    </section>
@endsection