<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teste = 'teste pass param';
        return view('welcome', ['teste' => $teste]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listaProdutos()
    {
        $listaProdutos = Produto::join('categorias', 'produtos.id_categoria', '=','categorias.id_categoria')
        ->get([
            'produtos.id_produto',
            'produtos.nome as nmp',
            'categorias.nome as nmc'
        ]);
        return view('produtos.lista', ['listaProdutos' => $listaProdutos]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detalheProduto($id)
    {
        $produto = Produto::join('categorias', 'produtos.id_categoria', '=','categorias.id_categoria')
        ->where('id_produto', '=', $id)
        ->get([
            'produtos.id_produto',
            'produtos.nome as nmp',
            'categorias.nome as nmc'
        ]);
        $fornecedores = new ForneceProdutoController;
        return view('produtos.detalhe', ['produto' => $produto, 'fornecedores'=> $fornecedores->show($id)]);
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
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        //
    }
}
