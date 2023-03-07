<?php

namespace App\Http\Controllers;

use App\Models\Movimento;
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
        ->join('entradas', 'movimentos.id_movimento', '=', 'entradas.id_movimento')
        ->get([
            'movimentos.id_movimento as ID',
            'movimentos.quantidade as QTY',
            'produtos.nome as Nome',
            'entradas.nota_fiscal as NF',
            'movimentos.numeroSerie as N. de série',
            'entradas.valor as Valor',
            'entradas.garantia as Garantia',
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
        $fornecedores = new FornecedorController;
        return view('/estoque/entrada', [
            'titulopadrao'   => 'Registro de produtos',
            'caminhoDetalhe' => '#',
            'novo'           => '#',
            'fornecedores'     => $fornecedores->listaFornecedores()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $temp=[];
        foreach($request as $item)
            array_push($temp, $request->nota_fiscal, $request->valor);
        return view('teste', ['teste' => $temp]);
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
