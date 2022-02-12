<?php

// ini_set('max_execution_time', '300');
// set_time_limit(320);

// echo '<pre>';print_r(phpinfo());echo '</pre>';
// echo '<pre>';print_r(session('Clientes'));echo '</pre>';
use App\Http\Controllers\ContatoController;
use App\Classes\Mkauth\ApiMkauth;

// session()->forget('Clientes');
// $Mkauth = new ApiMkauth();
// echo '<pre>';print_r($Mkauth->getAllClientes());echo '</pre>';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página de Administração do site - Eletronet</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('adminsite/css/layout.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
  <script type="text/javascript" src="{{asset('adminsite/js/layout.js')}}">

  </script>
  <!-- charts -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script type="text/javascript" defer>
  // atualizaClientesAtivos()
  function atualizaClientesAtivos(){
        $.ajax({
          url:'{{route("atualizaMkauth")}}',
          type: "get",
          beforeSend:(res)=>{
            console.log("carregando todos clientes Mkauth");
           $('.load').show()
          },
          success:(res)=>{
            // console.log('teste:' + res)
            console.log("carregado com successo")
            console.log(res)
            $('.load').hide()
          //  $('.count_total_clientes_ativos').text(res)
          },
          error:(res)=>{
            console.log("erro")
            console.log(res)
            $('.load').hide()
          }
        })
  }
  function countClientesAtivos(){
        $.ajax({
          url:'{{route("countClientesAtivos")}}',
          type: "get",
          beforeSend:(res)=>{
            console.log("Contando todos clientes");
          //  $('.load').show()
          },
          success:(res)=>{
            // console.log('teste:' + res)
            $('.load').hide()
            $('.count_total_clientes_ativos').text(res)
          },
          error:(res)=>{
            console.log("erro")
            console.log(res)
            $('.load').hide()
          }
        })
  }
  function countClientesConectados(){
        $.ajax({
          url:'{{route("getCountAllUserActive")}}',
          type: "get",
          beforeSend:(res)=>{
            console.log("Contando clientes Conectados");
          //  $('.load').show()
          },
          success:(res)=>{
            // console.log('teste:' + res)
            $('.load').hide()
            $('.count_total_clientes_conectados').text(res)
          },
          error:(res)=>{
            console.log("erro")
            console.log(res)
            $('.load').hide()
          }
        })
  }
  function countClientesDesconectados(){
        $.ajax({
          url:'{{route("countClientesDesconectados")}}',
          type: "get",
          beforeSend:(res)=>{
            console.log("Contando clientes desconectados");
          //  $('.load').show()
          },
          success:(res)=>{
            // console.log('teste:' + res)
            $('.load').hide()
            $('.count_total_clientes_desconectados').text(res)
          },
          error:(res)=>{
            console.log("erro")
            console.log(res)
            $('.load').hide()
          }
        })
  }
  function ClientesDesconectados(){
        $.ajax({
          url:'{{route("getClientesDesconectados")}}',
          type: "get",
          beforeSend:(res)=>{
            console.log("clientes desconectados");
          //  $('.load').show()
          },
          success:(res)=>{
            // console.log('teste:' + res)
            $('.load').hide()
            // $('.list_clientes_desconectados').text(res)
            console.log(res.length)
            $('.getClientesDesconectados').html('').append('<ul class="list_clientes">')
            for(let i=0;i<res.length;i++){
                //
                $('.getClientesDesconectados ul').append('<li class="bg-danger">'+res[i]['login']+'</li>')
            }
            $('.getClientesDesconectados').append('</ul>')
          },
          error:(res)=>{
            console.log("erro")
            console.log(res)
            $('.load').hide()
          }
        })
  }
  function ClientesBloqueados(){
    $.ajax({
          url:'{{route("getClientesBloqueados")}}',
          type: "get",
          beforeSend:(res)=>{
            console.log("clientes Bloqueados");
          //  $('.load').show()
          },
          success:(res)=>{
            // console.log('teste:' + res)
            $('.load').hide()
            // $('.list_clientes_desconectados').text(res)
            console.log(res.length)
            $('.getClientesBloqueados').html('').append('<ul class="list_clientes">')
            for(let i=0;i<res.length;i++){
                //
                $('.getClientesBloqueados ul').append('<li class="">'+res[i]['login']+'</li>')
            }
            $('.getClientesBloqueados').append('</ul>')
          },
          error:(res)=>{
            console.log("erro")
            console.log(res)
            $('.load').hide()
          }
        })
  }
  function countClientesBloqueados(){
        $.ajax({
          url:'{{route("countClientesBloqueados")}}',
          type: "get",
          beforeSend:(res)=>{
            console.log("Contando clientes bloqueados");
          //  $('.load').show()
          },
          success:(res)=>{
            // console.log('teste:' + res)
            $('.load').hide()
            $('.count_total_clientes_bloqueados').text(res)
            //var soma = (bloq+desc)

            // $('.total_clientes_desconectados').text(soma)
          },
          error:(res)=>{
            console.log("erro")
            console.log(res)
            $('.load').hide()
          }
        })
  }
  function todosClientesDesconectados(){
    var desc = $('.count_total_clientes_desconectados').text();
    var bloq = $('.count_total_clientes_bloqueados').text();
    var num1 = parseInt(bloq)
    var num2  =parseInt(desc)
    var soma = (num1+num2)
    $('.count_clientes_desconectados').text(soma)
  }

  countClientesAtivos()
  countClientesConectados()
  countClientesBloqueados()
  countClientesDesconectados()
  // todosClientesDesconectados()
//   ClientesDesconectados()
//   ClientesBloqueados()
  var rodarRotina = true
  if (rodarRotina) {
    setInterval(function () {
      countClientesAtivos()
      countClientesConectados()
      countClientesBloqueados()
      countClientesDesconectados()
      todosClientesDesconectados()
    //   ClientesDesconectados()
    //    ClientesBloqueados()
    }, 10000);
  }



  function separaDados(){
        $.ajax({
          url:'{{route("separa")}}',
          type: "get",
          beforeSend:(res)=>{
            console.log("separando os clientes");
            $('.load').show()
          },
          success:(res)=>{
            // console.log('teste:' + res)
            console.log("separado com successo")
            console.log(res)
            $('.load').hide()
          },
          error:(res)=>{
            console.log("erro")
            console.log(res)
            $('.load').hide()
          }
        })
    }
  </script>

</head>
<body>

    @if (session('UsuarioLogado'))

        <section class="container-fluid container_flex">
          <section class="box_align">
            <ul class="menu_principal">
                <li> <a href="{{route('admin')}}">Home</a> </li>
                <li> <a href="{{route('empresa')}}">Empresa</a></li>
                <li><a href="#">Clientes</a>
                    <ul>
                        <li> <a href="{{route('clientes')}}">Todos Clientes</a></li>
                        <li> <a href="#InserirCliente">Inserir Cliente</a></li>
                        <li> <a href="#BuscarCliente">Buscar Cliente</a></li>
                        <li> <a href="#MapaCliente">Mapa Clientes</a></li>
                    </ul>
                </li>
                <li><a href="#">Site</a>
                    <ul>
                      <li><a href="{{route('configsite')}}">Config Site</a></li>
                      <li><a href="{{route('paginahome')}}">Página Home</a></li>
                      <li><a href="{{route('paginasobre')}}">Página Sobre</a></li>
                    </ul>
                </li>
                <li><a href="#">Serviços Api</a>
                    <ul>
                      <li><a href="#mikrotik">Mikrotik</a></li>
                      <li><a href="#whatsapp">WhatsApp</a></li>
                      <li><a href="#mkauth">Mk-Auth</a></li>
                      <li><a href="#emby">Emby</a></li>
                    </ul>
                </li>
                <li> <a href="#">Relatorios</a></li>
                <li><a href="#">{{session('UsuarioLogado')}}</a>
                    <ul>
                        <li> <a href="#">Perfil</a> </li>
                        <li> <a href="sair">Sair</a> </li>
                    </ul>
                </li>
            </ul>
          </section>
          <section class="content_right">
            <header id="Topo">
             <div>
                 notificacoes - suporte, mensagem de contato, newsletter, solicitacao de instalacoes ...
             </div>
            </header>
            <div class="content">
                 @yield('content')
            </div>
          </section>


        {{-- informações da empresa. <br>
        -->Nome  --- Razao social ou nome fantasia<br>
        -->Logo --- logo original da empresa<br>
        -->Slogan ---  pequena frase de impacto<br>
        -->Sobre --- um texto descritivo<br>
        -->Localização  --- log/lat<br>
        -->Contato --- Suporte Tecnico - 81988721029 - suporte@eletronet.com.br <br>
        -->Horario --- dias uteis - 8:00 - 19:00 <br>
        -->Cobertura --- link do mapa do google<br>
        -->Redes Sociais --- facebok - facebook.com/eletronetsocorro<br>
        -->Diferenciais --- icone - titulo - descricao - imagem<br>
        -->Planos --- titulo - instalacao - roteador - valor<br>
        -->Duvidas --- titulo - resposta<br>
        <hr>
        informações do layout e site <br>
        -->Banner <br>
        -->Tema <br>
        -->Menu <br>
        --> <br>
        <hr>
        dados recolhidos no site <br>
        -->Newsletter <br>
        -->Assinantes --- nome - contato - endereco -  status <br>
        -->Termos Aceitos --- assinante <br>
        -->Mensagens de contato <br>
        -->Enderecos Assinantes <br>
        -->Contato Assinantes <br>
        -->Solicitacao de Instalação --- plano escolhido - nome - telefone - endereco(cep, rua, numero,bairro,cidade)<br>
        -->Solicitacao de suporte --- assinante - data/hora da solicitacao - status<br> --}}
    @else

        <div class="container area-login">
          @if ($errors->any())
              <div class="alert alert-danger my-alert">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          @if (session('danger'))
              <div class="alert alert-danger  my-alert">
                  {{ session('danger') }}
              </div>
          @endif
          <div class="content-form-login col-sm-4 col-8">
            <form action="{{route('logar')}}" method="POST" class="col-12">
                @csrf
                <h5>
                    <label for="">Painel Administrativo</label>
                </h5>
                <div class="col-12">
                    <input class="form-control" type="text" name="Login" id="" placeholder="Digite seu Login">
                </div>
                <div class="col-12">
                    <input class="form-control" type="password" name="Senha" id="" placeholder="Digite sua Senha">
                </div>
                <div class="col-12">
                    <input class="btn btn-primary" type="submit" id="" value="Entrar">
                    <input class="btn btn-warning" type="reset" id="" value="Limpar">
                </div>
            </form>
          </div>
        </div>


    @endif




<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> -->

</body>
</html>
