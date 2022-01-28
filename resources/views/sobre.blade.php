@extends('layouts.index')

@section('title')
    Sobre Nossa Empresa
@endsection

@section('content')
    <section class="sobre">
        <figure class="col-lg-5 col-md-6 col-sm-12">
            <img src="{{asset('site/imagens/layout/sobre_nos.png')}}" alt="" srcset="">
        </figure>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <header>
                <h1>Conheça a Empresa</h1>
                <h4>Porque nós somos a empresa que mais cresce na região?</h4>
            </header>
            <section>
                <article>
                    <header>
                        <i class="fa fa-edit"></i> Missão
                    </header>
                    <p>
                        atender os clientes atender os clientes atender os clientes
                        atender os clientes atender os clientes atender os clientes
                        atender os clientes atender os clientes
                    </p>
                </article>
                <article>
                    <header>
                        <i class="fa fa-eye"></i> Visão
                    </header>
                    <p>
                        atender os clientes atender os clientes atender os clientes
                        atender os clientes atender os clientes atender os clientes
                        atender os clientes atender os clientes
                    </p>
                </article>
                <article>
                    <header>
                        <i class="fa fa-check"></i> Valores
                    </header>
                    <p>
                        atender os clientes atender os clientes atender os clientes
                        atender os clientes atender os clientes atender os clientes
                        atender os clientes atender os clientes
                    </p>
                </article>
            </section>
        </div>
    </section>
@endsection