@extends('layouts.index')

@section('title')
    Página inicial - Sejam Bem Vindos!
@endsection

@section('content')    
    <section class="box_1">
        <div class="banner">
            <figure>
                <img src="{{asset('site/imagens/layout/banner_roteadores.png')}}" alt="Banner">
            </figure>
        </div>
    </section>
    <section class="box_2">
        <div class="col-sm-12 col-md-6">
            <h2>Vivencie a melhor experiencia na internet</h2>
            <p>
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of 
                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                software like Aldus PageMaker including versions of Lorem Ipsum
            </p>
        </div>
        <div class="col-sm-12 col-md-4">
            <figure>
                <img src="{{asset('site/imagens/layout/o_melhor_da_internet.png')}}" alt="#" srcset="">
            </figure>
        </div>
    </section>
    <div class="modal_">
        > modal de enviar solicitacao de instalacao com o plano escolhido,nome, telefone e endereco. <br>
        > diferenciais - mais detalhes do botao saber mais...
    </div>
    <section class="box_4" id="Servicos">
        <div class="">
            <h6>Nossos Diferenciais <i class="fa fa-gear"></i></h6>
            
            <h3>Somos o provedor de internet que mais cresce na região</h3>
            <ul class="col-12">
                <li class="col-sm-12 col-md-3">
                    <i class="fa-solid fa-gauge-simple"></i>
                    <h4>Velocidade e Estabilidade</h4>
                    <p>Navegue nas suas redes sociais preferidas e muito mais, sem interferencia no sinal.</p>
                    <div class="contatenos">
                        <i class="fa fa-plus"></i><a href="#">Saiba mais...</a>
                    </div>
                </li>
                {{-- <li class="col-sm-12 col-md-3">
                    <i class="fa fa-signal"></i>
                    <h4>Planos de qualidade</h4>
                    <p>Você só encontra conosco os melhores planos pra você e sua familia</p>
                </li> --}}
                <li class="col-sm-12 col-md-3">
                    <i class="fa fa-house"></i>
                    <h4>FTTH</h4>
                    <p>
                        Entregamos a velocidade contratada de ponta a ponta. Do nosso provedor a sua residencia.
                    </p>
                    <div class="contatenos">
                        <i class="fa fa-plus"></i><a href="#">Saiba Mais...</a>
                    </div>
                </li>
                <li class="col-sm-12 col-md-3">
                    <i class="fa fa-wifi"></i>
                    <h4>Wifi de Qualidade</h4>
                    <p>Fornecemos roteadores gratis adequado para plano escolhido,  para navegar sem limites, no pc, notebook, smartphone ou SMART TV!</p>
                    <div class="contatenos">
                        <i class="fa fa-plus"></i><a href="#">Saiba mais...</a>
                    </div>
                </li>
                <li class="col-sm-12 col-md-3">
                    <i class="fa-solid fa-globe"></i>
                    <h4>Banda Ilimitada</h4>
                    <p>Trafego sem limite de Banda.</p>
                    <div class="contatenos">
                        <i class="fa fa-plus"></i><a href="#">Saiba mais...</a>
                    </div>
                </li>
                <li class="col-sm-12 col-md-3">
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                    <h4>Instalação Rápida</h4>
                    <p>Fazemos sua instalação dentro de alguns minutos, conforme a disponibilidade e acesso a sua residencia.</p>
                    <div class="contatenos">
                        <i class="fa fa-plus"></i><a href="#">Saiba mais...</a>
                    </div>
                </li>
                <li class="col-sm-12 col-md-3">
                    <i class="fa-solid fa-server"></i>
                    <h4>Uptime 99.7%</h4>
                    <p>Servidor ativo 24hrs, com qualidade e tecnologia de ponta!</p>
                    <div class="contatenos">
                        <i class="fa fa-plus"></i><a href="#">Saiba mais...</a>
                    </div>
                </li>
            </ul>
        </div>
    </section>   
   
    <section class="box_planos" id="Planos">        
        <ul>
            {{-- <li class="col-xl-2 col-lg-3 col-md-5 col-11">
                <header>
                    <h1>
                        45 MEGA
                    </h1>
                </header>
                <ul>
                    <li>Sem Franquia</li>
                    <li>Youtube</li>
                    <li>Netflix</li>
                    <li>Redes Sociais</li>
                    <li>Games</li>
                    <li>Live</li>
                    <li>100% Fibra Optica</li>
                </ul>
                <footer>
                    <div>
                        <p>Apenas <span>R$ 50,00</span>/mês</p>
                    </div>
                    <a href="#"><i class="fa-brands fa-whatsapp"></i> Assinar</a>
                </footer>
            </li> --}}
            <li class="col-xl-2 col-lg-3 col-md-5 col-11">
                <header>
                    <h1>
                        60 MEGA
                    </h1>
                </header>
                <ul>
                    <li>Instalação R$ 50,00</li>
                    <li>Roteador</li>
                    <li>100% Fibra Optica</li>
                </ul>
                <footer>
                    <div>
                        <p>Apenas R$<span>55,00</span>/mês</p>
                    </div>
                    <a href="#">Assinar</a>
                </footer>
            </li>
            <li class="col-xl-2 col-lg-3 col-md-5 col-11">
                <header>
                    <h1>
                        100 MEGA
                    </h1>
                </header>
                <ul>
                    <li>Instalação gratis</li>
                    <li>Roteador</li>
                    <li>100% Fibra Optica</li>
                </ul>
                <footer>
                    <div>
                        <p>Apenas R$<span>65,00</span>/mês</p>
                    </div>
                    <a href="#">Assinar</a>
                </footer>
            </li>
            <li class="col-xl-2 col-lg-3 col-md-5 col-11">
                <header>
                    <h1>
                        200 MEGA
                    </h1>
                </header>
                <ul>
                    <li>Instalação gratis</li>
                    <li>Roteador Plus 4 antenas</li>
                    <li>100% Fibra Optica</li>
                </ul>
                <footer>
                    <div>
                        <p>Apenas R$<span>74,90</span>/mês</p>
                    </div>
                    <a href="#">Assinar</a>
                </footer>
            </li>
            <li class="col-xl-2 col-lg-3 col-md-5 col-11">
                <header>
                    <h1>
                        300 MEGA
                    </h1>
                </header>
                <ul>
                    <li>Instalação gratis</li>
                    <li>Roteador Plus 4 antenas</li>
                    <li>100% Fibra Optica</li>
                </ul>
                <footer>
                    <div>
                        <p>Apenas R$<span>99,90</span>/mês</p>
                    </div>
                    <a href="#">Assinar</a>
                </footer>
            </li>
            <li class="col-xl-2 col-lg-3 col-md-5 col-11">
                <header>
                    <h1>
                        400 MEGA
                    </h1>
                </header>
                <ul>
                    <li>Instalação gratis</li>
                    <li>Roteador Plus 4 antenas</li>
                    <li>100% Fibra Optica</li>
                </ul>
                <footer>
                    <div>
                        <p>Apenas R$<span>110,99</span>/mês</p>
                    </div>
                    <a href="#">Assinar</a>
                </footer>
            </li>
            <li class="col-xl-2 col-lg-3 col-md-5 col-11">
                <header>
                    <h1>
                        500 MEGA
                    </h1>
                </header>
                <ul>
                    <li>Instalação gratis</li>
                    <li>Roteador Plus 4 antenas</li>
                    <li>100% Fibra Optica</li>
                </ul>
                <footer>
                    <div>
                        <p>Apenas R$<span>120,99</span>/mês</p>
                    </div>
                    <a href="#">Assinar</a>
                </footer>
            </li>
        </ul>
    </section>

    <section class="box_duvidas" id="Duvidas">
        <header>
            <h4>duvidas frequente</h4>
        </header>
        <ul>
            <li>
                <div><i class="fa-solid fa-plus"></i></div>
                <article>
                    <header>Precisa de linha telefonica</header>
                    <div>
                        entially unchanged. It was popularised in the 1960s with the release of Letraset
                         sheets containing Lorem Ipsum passages, and more recently with desktop
                         publishing software like Aldus PageMaker including versions of Lorem Ipsum
                    </div>
                </article>
            </li>
            <li>
                <div><i class="fa-solid fa-plus"></i></div>
                <article>
                    <header>Precisa de linha telefonica</header>
                    <div>
                        entially unchanged. It was popularised in the 1960s with the release of Letraset
                         sheets containing Lorem Ipsum passages, and more recently with desktop
                         publishing software like Aldus PageMaker including versions of Lorem Ipsum
                    </div>
                </article>
            </li>
            <li>
                <div><i class="fa-solid fa-plus"></i></div>
                <article>
                    <header>Precisa de linha telefonica</header>
                    <div>
                        entially unchanged. It was popularised in the 1960s with the release of Letraset
                         sheets containing Lorem Ipsum passages, and more recently with desktop
                         publishing software like Aldus PageMaker including versions of Lorem Ipsum
                    </div>
                </article>
            </li>
            <li>
                <div><i class="fa-solid fa-plus"></i></div>
                <article>
                    <header>Precisa de linha telefonica</header>
                    <div>
                        entially unchanged. It was popularised in the 1960s with the release of Letraset
                         sheets containing Lorem Ipsum passages, and more recently with desktop
                         publishing software like Aldus PageMaker including versions of Lorem Ipsum
                    </div>
                </article>
            </li>
            <li>
                <div><i class="fa-solid fa-plus"></i></div>
                <article>
                    <header>Precisa de linha telefonica</header>
                    <div>
                        entially unchanged. It was popularised in the 1960s with the release of Letraset
                         sheets containing Lorem Ipsum passages, and more recently with desktop
                         publishing software like Aldus PageMaker including versions of Lorem Ipsum
                    </div>
                </article>
            </li>
        </ul>
    </section>
@endsection