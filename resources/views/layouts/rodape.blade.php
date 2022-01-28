@section('rodape')
    <section class="rodape">
        <div class="volta_topo">
            <a href="#Topo"><i class="fa fa-arrow-up"></i></a>
        </div>
        <ul>
            <li><i class="fa fa-phone"></i> Fale conosco
                <figure><a href="https://www.instagram.com/eletronetsocorro" target="_blank"><i class="fa-brands fa-instagram"> eletronetsocorro</i></a></figure>
                <figure><a href="#"><i class="fa-brands fa-facebook"> Facebook</i></a></figure>
                <figure><a href="#"><i class="fa-brands fa-whatsapp"> Whatsapp</i></a></figure>
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
            <div class="logo_rodape"><figure><img src="{{asset('site/imagens/layout/logo.png')}}" alt="#"></figure><article>texto resumido da empresa</article></div>
            <div><h5>Links Rápido</h5>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="sobre">Sobre</a></li>
                    <li><a href="contato">Contato</a></li>
                    <li><a href="cobertura">Cobertura</a></li>
                    <li><a href="planos">Planos</a></li>
                    <li><a href="servicos">Serviços</a></li>
                    <li><a href="assinante">Assinante</a></li>
                </ul>
            </div>
            <div>
                <header>Newsletter</header>
                <form action="" method="post">
                    @csrf
                    <input type="email" name="" id="" placeholder="Digite seu email">
                    <input type="submit" value="Cadastrar">
                </form>
            </div>
        </section>
        <div><p>&copy; copyright Todos os direitos reservados - Eletronet 2021.</p></div>
    </section>
@show
