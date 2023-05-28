<?php

namespace App\Http\Controllers;

use App\Models\entrada;
use App\Models\saida;
use App\Models\Movimento;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entradas = Entrada::join('produtos', 'produtos.id_produto', '=', 'entradas.id_produto')
            ->join('users', 'users.id_user', '=', 'entradas.id_user')
            ->select(                
                DB::raw("'Entrada' as Tipo"),
                'entradas.created_at as Data',
                'entradas.quantidade as QTY',
                'produtos.nome as Nome',
                'entradas.numeroSerie as N. de série',
                'users.name as Responsável'
            );

        $saidas = Saida::join('produtos', 'produtos.id_produto', '=', 'saidas.id_produto')
            ->join('users', 'users.id_user', '=', 'saidas.id_user')
            ->select(
                DB::raw("'Saída' as Tipo"),
                'saidas.created_at as Data',
                'saidas.quantidade as QTY',
                'produtos.nome as Nome',
                'saidas.numeroSerie as N. de série',
                'users.name as Responsável'
            );

        $dados = $entradas->union($saidas)
            ->orderBy('Data')
            ->get();

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
