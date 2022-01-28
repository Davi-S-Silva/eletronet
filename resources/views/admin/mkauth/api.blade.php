@extends('admin.index')

<!-- key: dbeab3065e176c43af78d171ef9d699b

cliente: listAll, list

titulo: listAll, list, receber

chamado: listAll, list

conta: listAll, list

empresa: listAll

instalacao: listAll, list

plano: listAll, list

usuario: listAll, list

caixa: listAll, list


/////

cliente:  login do cliente.


titulo:  numero do titulo.

chamado: codigo do chamado.

conta: numero da conta.

empresa: não precisa de valor.

instalacao: id da instalação.

plano: nome do plano.

usuario: login do usuario.

caixa: login do usuario.

////


http://api:dbeab3065e176c43af78d171ef9d699b@192.125.255.2/api/plano/listAll
http://api:dbeab3065e176c43af78d171ef9d699b@170.78.89.96:4000/api/plano/listAll

/api/plano/list/nomedoplano -->
<!-- teste mkauth
<br> -->
<!-- <hr> -->
@section('content')
<?php
use App\Classes\Mkauth\ApiMkauth;

$Mkauth = new ApiMkauth();
echo '<pre>';
// echo count($Mkauth->getAllClientes());
echo '<br />';
if(session('UsuarioLogado')){
  print_r($Mkauth->getAllClientesAtivos());
}
//
// echo $Mkauth->getCliente('davisantosdasilva')['dados']->nome;
echo '</pre>';

// $url = $protocolo.'api:'.$keyMkauth."@".$ipMkauth."/api/cliente/list/davisantosdasilva";
?>
@endsection
