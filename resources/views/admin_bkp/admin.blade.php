@extends('admin.index')
@section('content')

<?php

// use App\Classes\Mkauth\ApiMkauth;
use App\Http\Controllers\ApiMkauthController as MkauthController;
use App\Classes\Mikrotik\ApiMikrotik;

if (session('UsuarioLogado')) {
    if (session('Clientes') == null) {
        echo 'carregar dados mkauth';
        ?>
    <script type="text/javascript">
      window.location.href='admin/atualizaMkauth'
    </script>
        <?php
        return;
    }
// $Mkauth = new ApiMkauth();
    $Mikrotik = new ApiMikrotik();
    $totalClientesCadastradoAtivos = 0;
    $totalClientesConectados = 0;
    $bloqueados = 0;
    $desconectados = 0;
    $totalDesconectados = 0;

    $Mkauth = new MkauthController();
    if (session('Clientes')) {
        $totalClientesCadastradoAtivos = $Mkauth->getCountClientesAtivos();
        $totalClientesConectados = $Mikrotik->getCountAllUserActive();
        $bloqueados = $Mkauth->getCountClientesBloqueados();
        $desconectados = $Mkauth->getCountDesconectados();
        $totalDesconectados = $desconectados + $bloqueados;
    }
    ?>


<div class="content_home">
  <div class="header_content_home">
    <ul class="">
      <li class="total_clientes_ativos"> <div class="count_total_clientes_ativos">{{$totalClientesCadastradoAtivos}}</div> <div>Total Clientes</div></li>
      <!-- <li>510<div>Ativos</div></li>
      <li>10<div>Desativados</div></li> -->
      <li class="total_clientes_conectados"><div class="count_total_clientes_conectados">{{$totalClientesConectados}}</div><div>Conectados</div></li>
      <li class="total_clientes_desconectados"><span class="count_total_clientes_bloqueados">{{$bloqueados}}</span> + <span class="count_total_clientes_desconectados">{{$desconectados}}</span> = <span class="count_clientes_desconectados">{{$totalDesconectados}}</span>
        <div>Bloqueados + Desconectados</div></li>
    </ul>
  </div>
  <div class="conteudo_content_home">
    <div class="load" id="load">
        <img src="{{asset('adminsite/imagens/loading.gif')}}"/>
    </div>
      <div class="getClientesDesconectadosBloqueados">
          <div class="getClientesDesconectados">
              @include('admin.includes.listClientes',['clientes'=>$Mkauth->getClientesDesconectados()])
          </div>
         <div class="getClientesBloqueados">
             @include('admin.includes.listClientes',['clientes'=>$Mkauth->getClientesBloqueados()])
        </div>
        <?php
        // print_r($Mkauth->getClientesDesconectados());
        // foreach ($Mkauth->getClientesDesconectados() as $desconectados) {
        //     echo  $desconectados;
        //     echo '<br/>';
        // }
        //   echo '<hr />';
        // foreach ($Mkauth->getClientesBloqueados() as $bloqueados) {
        //     echo $bloqueados['login'];
        //     echo '<br/>';
        // }
        ?>
      </div>

    <div class="grafico_1">
      <canvas id="myChart"></canvas>
    </div>


    <script>
      const labels = [
        'Conectados',
        'Desconectados'
      ];
      const data = {
        labels: labels,
        datasets: [{
          label: 'Clientes',
          backgroundColor: ['#0ea300','#f00'],
          borderColor: ['#0ea300','#f00'],
          data: [{{$totalClientesConectados}}, {{$totalDesconectados}}],
        }]
      };
      const config = {
        type: 'doughnut',
        data: data,
        options: {}
      };
      const myChart = new Chart(
         document.getElementById('myChart'),
         config
       );
    </script>
  </div>
</div>
<?php } ?>
@endsection
