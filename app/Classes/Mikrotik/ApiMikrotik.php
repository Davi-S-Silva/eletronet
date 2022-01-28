<?php

namespace App\Classes\Mikrotik;
require_once('../../config.php');

use \RouterOS\Client;
use RouterOS\Config;
use \RouterOS\Query;

class ApiMikrotik{
    private $client;
    // public $clientesConectados;  
    public function __construct(){
        $config = new Config([
            'host' => HOST,
            'user' => USER,
            'pass' => PASS,
            'port' => PORT,
        ]);
        $this->client = new Client($config);
        // if(session('UsuarioLogado')!=null){
        //   $this->clientesConectados = session(['ClientesConectados'=>$this->getAllActive()]);
        // }else{
        //   $this->clientesConectados = session('ClientesConectados');
        // }
    }

    public function getUserActive($user){
        $query = new Query('/ppp/active/print');
        $query->where('name', $user);
        $request = $this->client->query($query);
        $response = $this->client->read();
        foreach($response as $valor){}
        return $valor;
    }
    public function getUserActiveForId($id){
        $query = new Query('/ppp/active/print');
        // $query->where('.id', '*'.$id);
        $query->where('.id', $id);
        $request = $this->client->query($query);
        $response = $this->client->read();
        if(count($response)==0){
            return false;
        }else{
            foreach($response as $valor){}
            return $valor['name'];
        }
    }

    public function getAllActive(){
        $query = new Query('/ppp/active/getall');
        $query->where('radius', 'true');
        $request = $this->client->query($query);
        $response = $this->client->read();
        for ($i=0; $i < count($response); $i++) {
            $array2[$response[$i]['name']] = $response[$i];
            // $array2[$response[$i]['name']]['id']= str_replace('*','',$array2[$response[$i]['name']]['.id']);
            // unset($array2[$response[$i]['name']]['.id']);
        }
        ksort($array2);
        foreach ($array2 as $value) {
            $array3[]=$value;
        }

        return $array3;
    }
    public function getUserInterface($user){
        $query = new Query('/interface/print');
        $query->where('name', '<pppoe-'.$user.'>');
        $request = $this->client->query($query);
        $response = $this->client->read();


        $replace_1 = str_replace('<pppoe-','',$response[0]['name']);
        $replace_2 = str_replace('>','',$replace_1);
        $response[0]['name'] = $replace_2;
        foreach($response as $valor){}
        return $valor;
    }
    public function getAllInterface(){
        $query = new Query('/interface/getall');
        $query->where('type', 'pppoe-in');
        $request = $this->client->query($query);
        $response = $this->client->read();

        for ($i=0; $i < count($response) ; $i++) {
            $replace_1 = str_replace('<pppoe-','',$response[$i]['name']);
            $replace_2 = str_replace('>','',$replace_1);
            $response[$i]['name'] = $replace_2;
        }
        return $response;
    }
    public function getUserActiveInterface($user){
       $array['active'] = $this->getUserActive($user);
       $array['interface'] = $this->getUserInterface($user);
       return $array;
    }

    public function getAllUserVlan(){
        $array = $this->getAllActive();
        foreach ($array as $value) {
            $rest = substr($value['address'], 3, 2);
            ($rest=='0.')? $rest = 0 : $rest = $rest;

            $array2[$rest][]= $value;
        }
        ksort($array2);
        return $array2;
    }
    public function getVlans(){
        $array = $this->getAllUserVlan();
        return array_keys($array);
    }


    public function getAllUserOneVlan($vlan){
        $array = $this->getAllUserVlan();
        return $array[$vlan];
    }
    public function getCountAllUserActive(){
        return count($this->getAllActive());
    }
    public function getCountUserOneVlan($vlan){
        return count($this->getAllUserOneVlan($vlan));
    }
    public function monitoring($user){
        $query =new Query('/interface/monitor-traffic');
        $query->equal('interface', '<pppoe-'.$user.'>');
        $query->equal('once');

        // Send query to RouterOS
        $response = $this->client->query($query)->read();
        return $response;
    }
    public function teste(){
        // $query = new Query('/interface/bridge/host/print'); //nao retornou nada

        // $query = new Query('/ip/address/print'); //retorna os enderecos de ip

        // $query = new Query('/ip/route/getall'); //retorna as rotas
        //$query->where('scope', '30'); //

        // $query = new Query('/interface/vlan/print'); //retorna as vlans

        //$query = new Query('/interface/ethernet/getall'); //retorna todas interface ethernet

        // $query = new Query('/ip/dhcp-server/lease/getall'); // servidor dhcp

        // $query = new Query('/interface/print'); //
        // $query->where('name', '<pppoe-raimundofaustinodossantos>'); //

        // $query->equal('once');

        // $query =new Query('/interface/monitor-traffic');         //
        // $query->equal('interface', '<pppoe-davisantosdasilva>'); //monitora trafego especifico
        // $query->equal('once');                                   //


        // Send query to RouterOS
        $response = $this->client->query($query)->read();
        return $response;
    }

    public function convertoToGb($valor){
        $valor_formatado = number_format(($valor/1048576),2,',','.');
        $tipo = (strlen($valor_formatado)>6) ? "Gb": "Mb";
        return number_format(($valor/1048576),2,',','.') . $tipo;
    }
}
