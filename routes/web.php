<?php

use App\Http\Controllers\FornecedorController;
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

Route::get('/', [ProdutoController::class, 'index']);
Route::get('lista', [ProdutoController::class, 'listaProdutos']);
Route::get('detalhe/{id}', [ProdutoController::class, 'detalheProduto']);
Route::get('fornecedor/{produto}', [FornecedorController::class, 'listaFornecedores']);