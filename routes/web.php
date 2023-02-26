<?php

use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\MovimentoController;
use App\Http\Controllers\ProdutoController;
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
Route::get('lista', [ProdutoController::class, 'listaProdutos']);
Route::get('produto/detalhe/{id}', [ProdutoController::class, 'detalheProduto']);
Route::get('fornecedores', [FornecedorController::class, 'index']);
Route::get('fornecedor/detalhe/{id}', [FornecedorController::class, 'listaFornecedores']);
Route::get('estoque', [EstoqueController::class, 'index']);
Route::get('movimentos', [MovimentoController::class, 'index']);