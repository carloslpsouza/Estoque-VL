<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produto;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Fornecedor::get([
            'id_fornecedor as ID',
            'nome as Nome',
            'fornecedores.cnpj as CNPJ',
            'email as Email',
            'telefone as Telefone'
        ]);
        return view('lista', ['dados' => $dados, 'titulopadrao' => 'Fornecedores', 'caminhoDetalhe' => 'fornecedor/detalhe/']); 
    }

    public function listaFornecedores($id){
        $fornecedor = Fornecedor::find($id);
        $dados = Produto::join('forneceProdutos', 'produtos.id_produto', '=', 'forneceProdutos.id_produto')
        ->where('forneceProdutos.id_fornecedor', '=', $id)
        ->get([
            'produtos.id_produto as ID',
            'produtos.nome as Nome',
            'produtos.observacoes as Observações'
        ]);
        return view('fornecedor/detalhe', ['dados' => $dados, 'fornecedor' => $fornecedor, 'titulopadrao' => 'Detalhes fornecedor', 'caminhoDetalhe' => '../../produto/detalhe/']); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function show(Fornecedor $fornecedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Fornecedor $fornecedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fornecedor $fornecedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fornecedor $fornecedor)
    {
        //
    }
}
