<?php

namespace App\Http\Controllers;

use App\Models\estoque;
use App\Models\setor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EstoqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setor = new SetorController;
        $dados = Estoque::join('produtos', 'produtos.id_produto', '=', 'estoque.id_produto')
        ->where('estoque.id_setor', '=', Auth::user()->id_setor)
        ->get([
            'produtos.id_produto as ID',
            'estoque.id_setor as Setor',
            'produtos.nome as Nome',
            'estoque.quantidade as Quantidade',
            'produtos.minimo as Mínimo'
        ]);
        return view('lista', [
            'dados'          => $dados, 
            'titulopadrao'   => 'Estoque - '.$setor->showName(Auth::user()->id_setor)[0]['nome'], 
            'caminhoDetalhe' => 'estoque/detalhe/',
            'novo'           => false]);        
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

        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\estoque  $estoque
     * @return \Illuminate\Http\Response
     */
    public function inFault()
    {
        $dados = DB::table('estoque')
            ->join('produtos', 'estoque.id_produto', '=', 'produtos.id_produto')
            ->select(
                'produtos.id_produto as ID',
                'produtos.nome as Nome',
                'estoque.quantidade as Atual',
                'produtos.minimo as Mínimo'
            )
            ->where('estoque.quantidade', '<', DB::raw('produtos.minimo'))
            ->where('id_setor', '=', Auth::user()->id_setor)
            ->paginate(10);
        
        return view('estoque/emfalta', [
            'dados' => $dados,
            'titulopadrao' => 'Material em falta',
            'caminhoDetalhe' => 'produto/detalhe/',
            'novo' => false
        ]);
    }
    
            /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\estoque  $estoque
     * @return \Illuminate\Http\Response
     */
    public function inFaultCount()
    {
        $dados = DB::select('SELECT produtos.id_produto as ID, produtos.nome as Nome, estoque.quantidade as Atual, produtos.minimo as Mínimo FROM estoque JOIN produtos ON estoque.id_produto = produtos.id_produto WHERE estoque.quantidade < produtos.minimo AND estoque.id_setor = '.Auth::user()->id_setor);
        return count($dados);
    }
}
