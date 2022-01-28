<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Mkauth\ApiMkauth as Mkauth;
use App\Classes\Mikrotik\ApiMikrotik;

class ApiMkauthController extends Controller
{
    private $TodosClientes;
  // public function __construct(){
  //   $this->getAllClientes();
  // }
    public function atualizaClientes()
    {
      // session()->forget('UltimaAtualizacaoMkauth');
      // return;
        if (session('UsuarioLogado') == null) {
            return 'usuario nao logado';
        }
      // if(session('UltimaAtualizacaoMkauth')==null){
      //   $dataHora = new \DateTime();
      //   session(['UltimaAtualizacaoMkauth'=>$dataHora]);
      // }else{
      //   $DataHora = new \DateTime();
      //   $dataHoraAtualizar = new \DateTime(session('UltimaAtualizacaoMkauth')->date);
      //   $dataHoraAtualizar->modify('+1 minute');
      //   echo "hora de atualizar".  $DateAndTimeAtualizar = $dataHoraAtualizar->format("d-m-Y h:i:s");
      //   echo '<br />';
      //   echo "hora atual:".  $DateAndTimeAtual= $DataHora->format("d-m-Y h:i:s");
      //   if($DateAndTimeAtual >= $DateAndTimeAtualizar){
      //     echo '<br /> atualizar';
      //     session(['UltimaAtualizacaoMkauth'=>$dataHoraAtualizar]);
      //     $this->getAllClientes(true);
      //     $this->getAllClientes();
      //   }else{
      //     echo '<br /> nada';
      //   }
      // }
        $this->getAllClientes(true);
        $this->getAllClientes();
        echo '<hr/>';
        echo '<pre>';
        print_r($this->TodosClientes);
        echo '</pre>';
    }
    public function getAllClientes($atualiza = false)
    {
      // session()->forget('Clientes');    return;
        $mkauth = new Mkauth();
      // return $mkauth->getAllClientes();
        if (session('UsuarioLogado') == null) {
            return 'usuario nao logado';
        }

        if (session('Clientes') == null || $atualiza == true) {
            echo 'atualizando';
            if ($mkauth->getAllClientes()) {
                session(['Clientes' => $mkauth->getTodosCliente()]);
                echo 'clientes carregados';
                $DataHora = new \DateTime();
                echo $DataHora->format("d-m-Y h:i:s");
            }
        } else {
            if (count(session('Clientes')) > 5) {
                if ($this->separaClientes(session('Clientes'))) {
                    $this->TodosClientes = session('Clientes');
                    echo '<br/>separado com sucesso';
                } else {
                    return 'erro - clientes nao separados';
                }
            } else {
                $this->TodosClientes = session('Clientes');
            }
        }
      // echo '<pre>';  print_r($this->TodosClientes);echo '</pre>';
        return true;
    }


    public function lerClientes()
    {
        $this->TodosClientes = session('Clientes');
        echo '<pre>';
        print_r($this->TodosClientes);
        echo '</pre>';
    }
    private function separaClientes($TodosClientes)
    {
        foreach ($TodosClientes as $cliente) {
            if ($cliente['dados'][0]['cli_ativado'] == 's' && $cliente['dados'][0]['bloqueado'] == 'nao') {
                $clientes['ativos'][] = $cliente['dados'][0];
            } elseif ($cliente['dados'][0]['cli_ativado'] == 's' && $cliente['dados'][0]['bloqueado'] == 'sim') {
                $clientes['bloqueados'][] = $cliente['dados'][0];
            } else {
                $clientes['desativados'][] = $cliente['dados'][0];
            }
        }
        session(['Clientes' => $clientes]);
        return true;
    }

  // public function SeparaClientes(){
  //   $mkauth = new Mkauth();
  //   return $mkauth->SeparaClientes();
  // }

    public function getCountClientesAtivos()
    {
        $this->TodosClientes = session('Clientes');
        //  print_r($this->TodosClientes);
        $ativos = count($this->TodosClientes['ativos']);
        $bloqueados = count($this->TodosClientes['bloqueados']);
        return $ativos + $bloqueados;
    }


    public function getAllClientesAtivos()
    {
        $mkauth = new Mkauth();
        return $mkauth->getAllClientesAtivos();
    }
    public function getClientesBloqueados()
    {
        return $this->TodosClientes['bloqueados'];
    }
    public function getCountClientesBloqueados()
    {
        $this->TodosClientes = session('Clientes');
        return count($this->TodosClientes['bloqueados']);
    }

    public function getClientesDesconectados()
    {
        $mikrotik = new ApiMikrotik();
        $this->TodosClientes = session('Clientes');
        for ($i = 0; $i < count($this->TodosClientes['ativos']); $i++) {
            $Clientes[] = strtolower($this->TodosClientes['ativos'][$i]['login']);
        }
        $ativos = $mikrotik->getAllActive();
        for ($i = 0; $i < count($ativos); $i++) {
            $conectados[] = strtolower($ativos[$i]['name']);
        }
        $desconectados = array_diff($Clientes, $conectados);
        return $desconectados;
    }
    public function getCountDesconectados()
    {
        return count($this->getClientesDesconectados());
    }
}
