<?php
namespace App\Classes\Mkauth;
use App\Classes\Mikrotik\ApiMikrotik;
require_once('../../config.php');
use \DateTime;

class ApiMkauth{
  private $url;
  private $TodosClientes;
  public function __construct(){
      $this->url = PROTOCOLO.'api:'.KEY_MKAUTH."@".IP_SERVIDOR;
  }
//METODOS PARA OS CLIENTES
    public function getAllClientes(){
            // $data = file_get_contents($this->url.'/api/cliente/listAll');
      // $dados = json_decode($data);
      $url = $this->url.'/api/cliente/listAll';
      $curl = curl_init($url);
      curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
      $data = curl_exec($curl);
      curl_close($curl);
       $dados = json_decode($data,true);
       // return $dados;
      foreach($dados['clientes'] as $value) {
        $cliente[] = $this->getCliente($value['login']);
      }
    //  $clientesSeparados = $this->SeparaClientes($cliente);
      $this->TodosClientes = $cliente;
      return true;
    }
    public function getTodosCliente(){
      return $this->TodosClientes;
    }
    // public function SeparaClientes($clientes){
    //   foreach($clientes as $value) {
    //     if($cliente['dados'][0]['cli_ativado']=='s' && $cliente['dados'][0]['bloqueado']=='nao'){
    //         $clientes['ativos'][] = $cliente['dados'][0];
    //     }elseif($cliente['dados'][0]['cli_ativado']=='s' && $cliente['dados'][0]['bloqueado']=='sim'){
    //       $clientes['bloqueados'][] = $cliente['dados'][0];
    //     }else{
    //       $clientes['desativados'][] = $cliente['dados'][0];
    //     }
    //     // $clientes['ativos']['count'] = count($clientes['ativos']);
    //     // $clientes['bloqueados']['count'] = count($clientes['bloqueados']);
    //     // $clientes['desativados']['count'] = count($clientes['desativados']);
    //   }
    //   return $clientes;
    //   //return $clientes;
    // }

    public function getAllClientesAtivos(){
      if(isset($this->TodosClientes['ativos'])){
          $todosClientes = $this->TodosClientes['ativos'];
          return $todosClientes;
      }
      return 0;
    }
    public function getCountClientesAtivos(){
      if(isset($this->TodosClientes['ativos']['count'])){
        return ($this->TodosClientes['ativos']['count'] + $this->TodosClientes['bloqueados']['count']);
      }
      return 0;
    }
    public function getAllClientesBloqueados(){
      $todosClientes = $this->TodosClientes['bloqueados'];
      return $todosClientes;
    }
  

    public function getClientesDesconectados(){
      $mikrotik = new ApiMikrotik();
      for ($i=0; $i < $this->TodosClientes['ativos']['count']; $i++) {
        $TodosClientes[]= strtolower($this->TodosClientes['ativos'][$i]['login']);
      }
      $ativos = $mikrotik->getAllActive();
      for ($i=0; $i < count($ativos); $i++) {
        $conectados[]= strtolower($ativos[$i]['name']);
      }

      $desconectados = array_diff($TodosClientes, $conectados);
      return $desconectados;
    }
    public function getCountDesconectados(){
      return count($this->getClientesDesconectados());
    }
    public function teste(){
      $url = $this->url.'/api/cliente/listAll';
      $curl = curl_init($url);
      curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
      $data = curl_exec($curl);
      curl_close($curl);
       $dados = json_decode($data,true);
     // $data = file_get_contents($url);
      // for ($i=0; $i < count($dados['clientes']); $i++) {
      //   $outros[]=$this->getCliente($dados['clientes'][$i]['login']);
      // }
      return $this->getCliente('davisantosdasilva');
      //return json_decode($outros,true);
    }
    public function getCliente($login){
      $url = $this->url.'/api/cliente/list/'.$login;
      $curl = curl_init($url);
      curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
      $data = curl_exec($curl);
      curl_close($curl);
     // $data = file_get_contents($url);
      $dados = json_decode($data,true);
      return $dados;
    }
// METODOS PARA TITULOS DE PAGAMENTOS
    private function getAllTitle(){
      $url = $this->url.'/api/titulo/listAll';
      $curl = curl_init($url);
      curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
      $data = curl_exec($curl);
      curl_close($curl);
    //  $data = file_get_contents($url);
      $dados = json_decode($data,true);
      return $dados['titulos'];
    }

    public function getTodosTitulosDesseAno(){
      $Data = new DateTime();
      $anoAtual = $Data->format('Y');
      $tituloAtual = [];
      foreach ($this->getAllTitle() as $value) {
        $dataVencimento = $value['datavenc'];
        $anoDataVencimento = substr($dataVencimento, 0, 4);
        if($anoDataVencimento == $anoAtual){
          $tituloAtual[$value['login']][] = $value;
        }
      }
      return $tituloAtual;
    }
    public function getTodosTitulosCliente($login){
      return $this->getTodosTitulosDesseAno()[$login];
    }
    public function getOneTitle($titulo){
      $url = $this->url.'/api/titulo/list/'.$titulo;
      $curl = curl_init($url);
      curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
      $data = curl_exec($curl);
      curl_close($curl);
    //  $data = file_get_contents($url);
      $dados = json_decode($data,true);
      return $dados;
    }
}
 ?>
