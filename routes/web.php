<?php

use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\MovimentoController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SessionController;
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
Route::get('lista', [ProdutoController::class, 'listaProdutos'])->middleware('auth');

Route::get('/produto/detalhe/{id}', [ProdutoController::class, 'show'])->middleware('auth');
Route::post('/getproduto/{nome?}', [ProdutoController::class, 'ajaxProduto'])->name('getproduto')->middleware('auth');
Route::post('/produtoIncluir', [EntradaController::class, 'storeTemp'])->name('incluirProduto')->middleware('auth');
Route::get('/produto/cadastro', [ProdutoController::class, 'create'])->middleware('auth');
Route::post('/produto/save', [ProdutoController::class, 'store'])->middleware('auth');

Route::get('/fornecedores', [FornecedorController::class, 'index'])->middleware('auth');
Route::get('/fornecedor/cadastro', [FornecedorController::class, 'create'])->middleware('auth');
Route::get('/fornecedor/detalhe/{id}', [FornecedorController::class, 'show'])->middleware('auth');
Route::post('/fornecedor/save', [FornecedorController::class, 'store'])->middleware('auth');

Route::get('/estoque', [EstoqueController::class, 'index'])->middleware('auth');
Route::get('/emfalta', [EstoqueController::class, 'inFault'])->middleware('auth');
Route::get('/movimentos', [MovimentoController::class, 'index'])->middleware('auth');
Route::get('/estoque/entrada', [EntradaController::class, 'index'])->middleware('auth');
Route::post('/entrada/save', [EntradaController::class, 'store'])->middleware('auth');

Route::get('/session/destroy/{session}', [SessionController::class, 'sessionDestroy']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
  Route::get('/estoque', [EstoqueController::class, 'index'])->name('dashboard');
});
