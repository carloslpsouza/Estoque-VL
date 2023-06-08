<?php

use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\MovimentoController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\SaidaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UsersAdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PrincipalController::class, 'index']);
Route::get('/dashboard', [PrincipalController::class, 'index']);
Route::get('/lista', [ProdutoController::class, 'listaProdutos'])->middleware('auth');

Route::get('/produto/detalhe/{id}', [ProdutoController::class, 'show'])->middleware('auth');
Route::get('/produto/cadastro', [ProdutoController::class, 'create'])->middleware('auth');
Route::post('/getproduto/{nome?}', [ProdutoController::class, 'jqueryProduto'])->name('getproduto')->middleware('auth');
Route::post('/produtoIncluir', [EntradaController::class, 'storeTemp'])->name('incluirProduto')->middleware('auth');
Route::post('/produtoBaixar', [SaidaController::class, 'storeTemp'])->name('BaixarProduto')->middleware('auth');
Route::post('/produto/save', [ProdutoController::class, 'store'])->middleware('auth');

Route::get('/fornecedores', [FornecedorController::class, 'index'])->middleware('auth');
Route::get('/fornecedor/cadastro', [FornecedorController::class, 'create'])->middleware('auth');
Route::get('/fornecedor/detalhe/{id}', [FornecedorController::class, 'show'])->middleware('auth');
Route::post('/getfornecedor/{id?}', [FornecedorController::class, 'jqueryFornecedor'])->name('getfornecedor')->middleware('auth');
Route::post('/fornecedor/save', [FornecedorController::class, 'store'])->middleware('auth');

Route::get('/estoque', [EstoqueController::class, 'index'])->middleware('auth');
Route::get('/emfalta', [EstoqueController::class, 'inFault'])->middleware('auth');
Route::get('/movimentos', [MovimentoController::class, 'index'])->middleware('auth');
Route::get('/estoque/entrada', [EntradaController::class, 'index'])->middleware('auth');
Route::get('/estoque/saida', [SaidaController::class, 'index'])->middleware('auth');
Route::get('/entrada/save', [EntradaController::class, 'store'])->middleware('auth');
Route::post('/getentrada/{nome?}', [EntradaController::class, 'jqueryEntrada'])->name('getentrada')->middleware('auth');

Route::get('/saida/save', [SaidaController::class, 'store'])->middleware('auth');

Route::get('/session/destroy/{session}', [SessionController::class, 'sessionDestroy'])->middleware('auth');

Route::get('/setor', [SetorController::class, 'index'])->middleware('auth');
Route::post('/getsetor/{nome?}', [SetorController::class, 'jquerySetor'])->name('getsetor')->middleware('auth');

Route::get('/categoria', [CategoriaController::class, 'index'])->middleware('auth');
Route::get('/categoria/cadastro', [CategoriaController::class, 'create'])->middleware('auth');
Route::post('/categoria/save', [CategoriaController::class, 'store'])->middleware('auth');

Route::get('/users', [UsersAdminController::class, 'index'])->middleware('auth');
Route::get('/users/cadastro', [UsersAdminController::class, 'create'])->middleware('auth');
Route::post('/users/save', [UsersAdminController::class, 'store'])->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
  Route::get('/estoque', [EstoqueController::class, 'index'])->name('dashboard');
});
