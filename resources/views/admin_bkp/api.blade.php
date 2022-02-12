@extends('admin.index')
@section('content')
<?php
use \RouterOS\Client;
use RouterOS\Config;
use \RouterOS\Query;

$config = new Config([
    'host' => '170.78.96.89',
    'user' => 'davisantos',
    'pass' => '32843826',
    'port' => 8745,
]);
$client = new Client($config);

// echo "<pre>";print_r($client);echo "</pre>";


// $client = new Client([
//     'host' => '170.78.96.89',
//     'user' => 'davisantos',
//     'pass' => '32843826',
//     'port' => 8745,
// ]);


$client = new Client($config);

// Build query -> buscar todos os clientes ativos
echo "<div><h1>Todos Active Connections</h1>";
$query = new Query('/ppp/active/getall');
$query->where('radius', 'false');
// Send query to RouterOS
$request = $client->query($query);

// Read answer from RouterOS
$response = $client->read();
echo count($response);echo " Clientes Conectados";
echo "<pre>";print_r($response);echo "</pre>";



//clientes ativos separados por vlans
$array = array();
foreach ($response as $key) {
    $array[][] = array('active'=>$key);
}


$query = new Query('/interface/getall');
$query->where('type', 'pppoe-in');
$interface = $client->query($query)->read();
$array2 = [];
$qtdAtivos=0;
// $instalacao = array('caixa'=>'',
//                     'pSplit'=>'',
//                     'dbSplit'=>'',
//                     'dbCliente'=>'',
//                     'percaDb'=>'',
//                     'mFibra'=>'',
//                     'conector'=>'',
//                     'roteador'=>'',
//                     'onu'=>'',
//                     'ont'=>'',
//                     'corrdenadas'=>array('log'=>'','lat'=>'')
//                 );

foreach ($array as $value) {
    //  echo '<pre>'; print_r($value);echo '</pre>';
    for ($i=0; $i<count($interface); $i++) {
        $clienteAtivo = $value[0]['active']['name'];

        $rep1 = str_replace('<pppoe-','',$interface[$i]['name']);
        $clienteInterface = str_replace('>','',$rep1);

        //echo ($i+1)."<br />";
        $rest = substr($value[0]['active']['address'], 3, 2);
        ($rest=='0.')? $rest = 0 : $rest = $rest;
        if($clienteAtivo == $clienteInterface){
            //echo '<br />'.$clienteInterface ."==". $clienteAtivo.'<br />';
            // print_r($interface[$i]);
            //print_r($value[0]);
            $cliente1 = str_replace('<pppoe-','',$clienteAtivo);
            $cliente2 = str_replace('>','',$cliente1);
            $interface[$i]['name'] = $cliente2;
            unset($array);
            $array2[$rest][] = array('vlan'=>$rest, 'active'=>$value[0]['active'],'interface'=>$interface[$i]/*, 'install'=>$instalacao*/);
        }
    }
}

ksort($array2);
$array3 = $array2;
foreach ($array3 as $key => $value) {
    ksort($value);
    // echo '<br />'. $value[$key]['active']['name'];
    // print_r($value);
    // echo '<pre>'; print_r($value);echo '</pre>';
}
// echo '<pre>'; print_r($array3[80][0]['active']['address']);echo '</pre>';


echo "</div><div><h1>Secret</h1>";
$query = new Query('/ppp/secret/print');
$query->where('name', 'davisantosdasilva');
$secrets = $client->query($query)->read();

echo "<br />Antes da atualização" . PHP_EOL;
echo "<pre>";print_r($secrets);echo "</pre>";

// pegando cliente especifico ativo
echo "</div><div><h1>Active Connection especifico</h1>";
$query = new Query('/ppp/active/print');
$query->where('name', 'davisantosdasilva');
$secrets = $client->query($query)->read();

echo "<br />Antes da atualização" . PHP_EOL;
echo "<pre>";print_r($secrets);echo "</pre>";

/////////////////////////////
echo "</div><div><h1>Interface todos</h1>";
$query = new Query('/interface/getall');
    // $query->where('name', '<pppoe-davisantosdasilva>');
$response = $client->query($query)->read();
// echo "<pre>";print_r($response);echo "</pre>";

echo "</div><div><h1>Interface Cliente especifico</h1>";
$query = new Query('/interface/getall');
    $query->where('name', '<pppoe-davisantosdasilva>');
$response = $client->query($query)->read();
// echo "servico: " .$response[0]['service-name'];
echo "<pre>";print_r($response);echo "</pre>";

echo "<h2>vlans</h2>";
$query = new Query('/interface/getall');
    $query->where('type', 'vlan');
$response = $client->query($query)->read();
// echo "servico: " .$response[0]['service-name'];
// echo "<pre>";print_r($response);echo "</pre>";


$query = new Query('/interface/vlan/getall');
// $query->where('service', 'service28');
// $query->where('name', 'vlan280');
$response = $client->query($query)->read();
// echo "servico: " .$response[0]['service-name'];
// echo "<pre>";print_r($response);echo "</pre>";


//usuarios do sistema ativos no momento
echo "<h2>Usuarios do sistema ativos no momento</h2>";
$query = new Query('/user/active/getall');
// $query->where('service', 'service28');
// $query->where('name', 'vlan280');
$response = $client->query($query)->read();
// echo "servico: " .$response[0]['service-name'];
echo "<pre>";print_r($response);echo "</pre>";

// $query = new Query('/system/package/print');
$query = new Query('/system/package/print');
// $query->where('service', 'service28');
// $query->where('name', 'vlan280');
$response = $client->query($query)->read();
// echo "servico: " .$response[0]['service-name'];
echo "<pre>";print_r($response);echo "</pre>";



// Build monitoring query
$query =
    (new Query('/interface/getall'))
       // ->equal('interface', 'vlan280')
       // ->equal('once');
    //    ->where('name', '<pppoe-flaviodanielsantosdasilva>');
       ->where('interface', 'vlan280');

// Ask for monitoring details
$out = $client->query($query)->read();
print_r($out);

///////////////

//pegando interface de cliente especifico - dados como pacote, consumo
echo "</div><h1>pegando interface de cliente especifico - dados como pacote, consum</h1>";
// $query =
    // (new Query('/interface/print'))
    //     ->where('name', '<pppoe-davisantosdasilva>');
$query = new Query('/interface/print');
$query->where('name', '<pppoe-davisantosdasilva>');
$response = $client->query($query)->read();
echo "<br />Antes da atualização" . PHP_EOL;
echo "<pre>";print_r($response);echo "</pre>";

$replace_1 =  str_replace("<pppoe-", "", $response[0]['name']);
$Usuario = str_replace(">", "", $replace_1);
echo "<br />Usuario: " .$Usuario;
$down = number_format(($response[0]['tx-byte']/1048576),2,',','.');
$up = number_format(($response[0]['rx-byte']/1048576),2,',','.');
echo "<br />Consumo: ";
echo "Download: "; echo $down; echo (strlen($down)>6)?" Gb":" Mb";
echo " - Upload: "; echo $up; echo (strlen($up)>6)?" Gb":" Mb";
echo "<br /> <p>Localização: <a href='https://www.google.com/maps/dir//-8.1027629,-34.9872959' target='_blank'>-8.1027629,-34.9872959</a></p>";//https://www.google.com/maps/dir//-8.1027629,-34.9872959
echo '<br /> Caixa: P2R1';
echo '<br /> P Split: 1';
echo '<br /> dB P Split: -23.69';
echo '<br /> dB Cliente: -25.48';
echo '<br /> Perca dB: 1.79';
echo '<br /> mF: ~70m';
echo '<br />Conector: Apc';
echo '<br />Roteador: Intelbras';
echo '<br />Onu: Intelbras';
echo '<br />Ont: null';
$porta_remota = 5252;
echo '<br /><p>Acesso Remoto: <a href="http://'.$secrets[0]['address'].':'.$porta_remota.'" target="_blank">'.$secrets[0]['address'].':'.$porta_remota.'</a></p>';
echo '<br /></div>';







// Build monitoring query
$query =
    (new Query('/interface/monitor-traffic'))
        ->equal('interface', '<pppoe-davisantosdasilva>')
        ->equal('once');

// Ask for monitoring details
$out = $client->query($query)->read();
echo "<pre>";print_r($out);echo "</pre>";



// Build monitoring query
$query =
    (new Query('/interface/monitor-traffic'))
        // ->equal('interface', '<pppoe-davisantosdasilva>')
        ->equal('once');

// Ask for monitoring details
$out = $client->query($query)->read();
echo "<pre>";print_r($out);echo "</pre>";



// print_r();
?>


@endsection
