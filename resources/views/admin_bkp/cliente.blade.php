@extends('admin.index')

@section('content')

<?php
use App\Classes\Mikrotik\ApiMikrotik;
$Api = new ApiMikrotik();
// echo '<pre>'; print_r($_SERVER);echo '</pre>';
// echo '<pre>';print_r($Api->getUserActive('davisantosdasilva'));echo '</pre>';
// echo '<pre>';print_r($Api->getAllActive());echo '</pre>';
// echo '<pre>';print_r($Api->getAllInterface());echo '</pre>';
// echo '<pre>';print_r($Api->getUserInterface('davisantosdasilva'));echo '</pre>';
// echo '<pre>';print_r($Api->getUserActiveInterface('davisantosdasilva'));echo '</pre>';
// echo '<pre>';print_r($Api->getAllUserVlan());echo '</pre>';
// echo '<pre>';print_r($Api->getAllUserOneVlan(0));echo '</pre>';
// echo '<pre>';print_r($Api->getCountAllUserActive(0));echo '</pre>';
// echo '<pre>';print_r($Api->getCountUserOneVlan(80));echo '</pre>';
// echo '<pre>';print_r($Api->getVlans());echo '</pre>';
// echo '<pre>';print_r($Api->monitoring('davisantosdasilva'));echo '</pre>';
// echo '<pre>';print_r($Api->teste());echo '</pre>';
if(isset($cliente)){
    $ClienteSelecionado = $Api->getUserActiveForId($cliente);
    if($ClienteSelecionado){
        $dadosCliente = $Api->getUserActiveInterface($ClienteSelecionado);
        $download = $Api->convertoToGb($dadosCliente['interface']['tx-byte']);
        $upload = $Api->convertoToGb($dadosCliente['interface']['rx-byte']);
        $porta = 5252;//vai puxar do banco de dados
        $NomeCompletoCliente = "Nome Completo Ficticio";//vai puxar do banco de dados
        $phone = '+5581986332809';
        ?>
        <h3>Dados Gerais</h3>
            Login: {{$dadosCliente['active']['name']}}
        <br>Acesso Remoto:
        <a href="http://{{$dadosCliente['active']['address']}}:{{$porta}}" rel="noopener noreferrer" target="_blank">{{$dadosCliente['active']['address']}}</a>
        <br>MAC: {{$dadosCliente['active']['caller-id']}}
        <br>Ultima Conexão: {{$dadosCliente['interface']['last-link-up-time']}}
        <br>UpTime: {{$dadosCliente['active']['uptime']}}
        <br>Consumo -----<br> Download {{$download}} / Upload {{$upload}}
        <hr>
        <h3>Dados Instalação</h3>
            Nome: {{$NomeCompletoCliente}}
        <br>Data e Hora Instalação: 00/00/0000 00h00
        <br>Endereco: rua blablabla, sn, socorro, jaboatao dos guararapes
        <br>Localização: <a href='https://www.google.com/maps/dir//-8.1027629,-34.9872959' target='_blank'>-8.1027629,-34.9872959</a>{{--https://www.google.com/maps/dir//-8.1027629,-34.9872959 --}}
        <br /> Caixa: P2R1
        <br /> P Split: 1
        <br /> dB P Split: -23.69
        <br /> dB Cliente: -25.48
        <br /> Perca dB: 1.79
        <br /> mF: ~70m
        <br />Conector: Apc
        <br />Roteador: Intelbras
        <br />Onu: Intelbras
        <br />Ont: null
        {{-- $porta_remota = 5252; --}}
        <hr>
        <h3>Dados Contato</h3>
        Celular: (81)90000-0000 (zap)
        <a href="https://api.whatsapp.com/send?phone={{$phone}}" target="_blank">(zap)</a>
        <br>
        E-mail:
        <a href="mailto:teste@gmail.com" target="_blank">teste@gmail.com</a>
    <?php
    }else{
        echo 'Não há Resultado!';
    }
    // echo '<pre>';print_r($dadosCliente);echo '</pre>';
}else{
?>
    todos os clientes
    <div class="admin_home">

        <?php

        //so para na aparecer
          $pesquisar = true;
          if($pesquisar ==true){
            ?>
            <div><h1>{{$Api->getCountAllUserActive()}}</h1></div>
            <!-- {{ <pre><?php // print_r($Api->getUserActiveInterface('davisantosdasilva'));?></pre>}} -->
            <div id="VlansClientes" class="col-12">
                @foreach ($Api->getVlans() as $vlan)
                    @include('admin/vlans', ['userVlan'=>$Api->getAllUserOneVlan($vlan), 'vlan'=>$vlan])
                @endforeach
            </div>
            <?php
          }
        ?>

    </div>
<?php
}
?>
@endsection
