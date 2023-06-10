<?php

namespace App\Http\Controllers;

use App\Models\entrada;
use App\Models\estoque;
use App\Models\Fornecedor;
use App\Models\Movimento;
use App\Models\Produto;
use App\Models\saida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrincipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qtdeProdutos     = Produto::all()->count();
        $qtdeEstoque      = estoque::all()->where('id_setor', '=', Auth::user()->id_setor)->sum('quantidade'); //relacionar ao setor
        //$qtdeEstoque    = estoque::all()->where('id_setor', '=', user.id_setor)->count();
        $qtdeFornecedores = Fornecedor::all()->count();
        $qtdeMovimentos   = entrada::all()->where('id_setor', '=', Auth::user()->id_setor)->count() + saida::all()->where('id_setor', '=', Auth::user()->id_setor)->count();
        $qtdeEmFalta      = new EstoqueController;
        $contadores = [
            'qtdeProdutos'     => $qtdeProdutos, 
            'qtdeEstoque'      => $qtdeEstoque, 
            'qtdeFornecedores' => $qtdeFornecedores,
            'qtdeMovimentos'   => $qtdeMovimentos,
            'qtdeEmFalta'      => $qtdeEmFalta->inFaultCount()
        ];
        return view('welcome', ['contadores' => $contadores]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
