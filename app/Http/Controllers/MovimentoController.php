<?php

namespace App\Http\Controllers;

use App\Models\entrada;
use App\Models\Movimento;
use App\Models\Produto;
use Illuminate\Http\Request;

class MovimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Movimento::join('produtos', 'produtos.id_produto', '=', 'movimentos.id_produto')
        ->join('users', 'users.id_user', '=', 'movimentos.id_user')
        ->get([
            'movimentos.id_movimento as ID',
            'movimentos.quantidade as QTY',
            'produtos.nome as Nome',
            'movimentos.numeroSerie as N. de série',
            'users.name as Responsável'
        ]);
        return view('lista', [
            'dados' => $dados, 
            'titulopadrao'   => 'Movimentos', 
            'caminhoDetalhe' => 'movimento/detalhe/',
            'novo'           => 'movimento/cadastro'
        ]); 
    }

    public function listaMovPProduto($id_produto)
    {
        $dados = Movimento::all()->where('id_produto', '=', $id_produto);
        return $dados;
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
     * @param  \App\Models\Movimento  $movimento
     * @return \Illuminate\Http\Response
     */
    public function show(Movimento $movimento)
    {
        $movimento = Movimento::findOrFail($movimento);
        
        return $movimento;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movimento  $movimento
     * @return \Illuminate\Http\Response
     */
    public function edit(Movimento $movimento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movimento  $movimento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movimento $movimento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movimento  $movimento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movimento $movimento)
    {
        //
    }
}
