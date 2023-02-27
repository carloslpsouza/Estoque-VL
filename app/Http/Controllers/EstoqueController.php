<?php

namespace App\Http\Controllers;

use App\Models\estoque;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dados = Estoque::join('produtos', 'produtos.id_produto', '=', 'estoque.id_produto')
        ->get([
            'produtos.id_produto as ID',
            'estoque.id_setor as Setor',
            'produtos.nome as Nome',
            'estoque.quantidade as Quantidade',
            'estoque.minimo as Mínimo'
        ]);
        return view('lista', ['dados' => $dados, 'titulopadrao' => 'Estoque', 'caminhoDetalhe' => 'estoque/detalhe/']);        
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
     * @param  \App\Models\estoque  $estoque
     * @return \Illuminate\Http\Response
     */
    public function show(estoque $estoque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\estoque  $estoque
     * @return \Illuminate\Http\Response
     */
    public function edit(estoque $estoque)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\estoque  $estoque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, estoque $estoque)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\estoque  $estoque
     * @return \Illuminate\Http\Response
     */
    public function destroy(estoque $estoque)
    {
        //
    }
}
