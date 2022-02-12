@section('rodape')
    <section class="rodape">
        <div class="volta_topo">
            <a href="#Topo"><i class="fa fa-arrow-up"></i></a>
        </div>
        <ul>
            <li class="contatos_redes">
                <div>
                    <i class="fa fa-phone"></i> Fale conosco
                </div>
                <div>
                    <figure title="link para a pagina do instagram da eletronet socorro"><a href="https://www.instagram.com/eletronetsocorro" target="_blank"><i class="fa-brands fa-instagram"></i></a></figure>
                    <figure title="link para a pagina do facebook da eletronet socorro"><a href="https://www.facebook.com/eletronetsocorro" target="_blank"><i class="fa-brands fa-facebook"></i></a></figure>
                    <figure title="link para enviar mensagem no whatsapp da eletronet socorro"><a href="https://wa.me/+5581988721029" target="_blank"><i class="fa-brands fa-whatsapp"></i></a></figure>
                </div>
            </li>
            <li><i class="fa-solid fa-envelope"></i> Envie-nos uma mensagem</li>
            <li><i class="fa-solid fa-location-dot"></i> Nossa Localização</li>
            <li><i class="fa-solid fa-calendar-check"></i> Horário de Funcionamento
                <ul>
                    <li>domingos e feriados - 09:00 as 12:00</li>
                    <li>segunda a sexta - 08:00 as 19:00</li>
                    <li>sabados - 08:00 as 17:00</li>
                </ul>
            </li>
        </ul>
        <section>
            <div class="logo_rodape">
                <figure><img src="{{ asset('site/imagens/layout/logo.png') }}" alt="#"></figure>
            </div>
            <div class="menu_rodape">
                {{-- <h5>Links Rápido</h5> --}}
                {{-- <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="sobre">Sobre</a></li>
                    <li><a href="contato">Contato</a></li>
                    <li><a href="cobertura">Cobertura</a></li>
                    <li><a href="planos">Planos</a></li>
                    <li><a href="servicos">Serviços</a></li>
                    <li><a href="assinante">Assinante</a></li>
                </ul> --}}
                @include('layouts.menu')
            </div>
            {{-- <div>
                <header>Newsletter</header>
                <form action="" method="post">
                    @csrf
                    <input type="email" name="" id="" placeholder="Digite seu email">
                    <input type="submit" value="Cadastrar">
                </form>
            </div> --}}
        </section>
        <div class="copy_end">
            <p>&copy; <b> copyright - Eletronet 2021</b> - Todos os direitos reservados.</p>
            <p>Rua 3ª Travessa Parnaiba, Socorro, Jaboatão dos Guararapes</p>
        </div>
    </section>
@show
