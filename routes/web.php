<?php

date_default_timezone_set('America/Sao_Paulo');
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\ApiMkauthController;
use App\Http\Controllers\ApiMikrotikController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('admin/testezap', function () {
    return view('admin.whatsapp.teste');
})->name('testezap');
Route::get('/play', function () {
    return view('servidorfilmes');
})->name('Servidor');
Route::get('/sobre', function () {
    return view('sobre');
});
// Route::get('/planos', function () {
//     return view('planos');
// });
// Route::get('/servicos', function () {
//     return view('servicos');
// });
Route::get('/contato', function () {
    return view('contato');
});
Route::get('/assinante', function () {
    return view('assinante');
})->name('assinante');
Route::get('/assinar', function () {
    return view('assinar');
})->name('assinar');
Route::get('/cobertura', function () {
    return view('cobertura');
});

//=======================ADMIN============================//

//rotas para admin
Route::get('/admin', function () {
    return view('admin.admin');
})->name('admin');

Route::get('/empresa', function () {
    return view('admin.empresa');
})->name('empresa');

Route::get('/admin/apimikrotik', function () {
    return view('admin/api');
});
Route::get('/admin/apimkauth', function () {
    return view('admin/mkauth/api');
});

Route::get('admin/clientes', function () {
    return view('admin/cliente');
})->name('clientes');
Route::get('admin/cliente/{user}', function ($user) {
    return view('admin/cliente', ['cliente' => $user]);
})->name('cliente');


Route::get('/configsite', function () {
    return view('admin.configsite');
})->name('configsite');
Route::get('/paginahome', function () {
    return view('admin.paginahome');
})->name('paginahome');
Route::get('/paginasobre', function () {
    return view('admin.paginasobre');
})->name('paginasobre');

Route::get('/admin/maps', function () {
    return view('admin.maps');
})->name('maps');


Route::post('/formempresa', [EmpresaController::class,'index'])->name('formempresa');

// Route::post('/novocontato',[EmpresaController::class,'addcontato'])->name('novocontato');

Route::post('/logar', [EmpresaController::class,'DadosEmpresa'])->name('logar');

Route::get('/sair', function () {
    session()->forget('UsuarioLogado');
    // session()->forget('Clientes');
    // unset(SESSION['Clientes']);
    return redirect()->route('admin');
})->name('sair');


// TESTE ajax
Route::get('admin/novaApi', [ApiMkauthController::class,'novaApi'])->name('novaApi');
Route::get('admin/atualizaMkauth', [ApiMkauthController::class,'atualizaClientes'])->name('atualizaMkauth');
Route::get('/separaClientes', [ApiMkauthController::class,'SeparaClientes'])->name('separa');
Route::get('admin/countClientesAtivos', [ApiMkauthController::class,'getCountClientesAtivos'])->name('countClientesAtivos');
Route::get('admin/countClientesConectados', [ApiMikrotikController::class,'getCountAllUserActive'])->name('getCountAllUserActive');
Route::get('admin/countClientesDesconectados', [ApiMkauthController::class,'getCountDesconectados'])->name('countClientesDesconectados');
Route::get('admin/countClientesBloqueados', [ApiMkauthController::class,'getCountClientesBloqueados'])->name('countClientesBloqueados');

Route::get('admin/getClientesDesconectados', [ApiMkauthController::class,'getClientesDesconectados'])->name('getClientesDesconectados');
Route::get('admin/getClientesBloqueados', [ApiMkauthController::class,'getClientesBloqueados'])->name('getClientesBloqueados');

Route::resource('novocontato', ContatoController::class);
