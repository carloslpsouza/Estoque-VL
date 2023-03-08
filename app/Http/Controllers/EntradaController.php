<?php

namespace App\Http\Controllers;

use App\Models\entrada;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fornecedores = new FornecedorController;
        return view('/estoque/entrada', [
            'titulopadrao'   => 'Enrtrada de produtos',
            'caminhoDetalhe' => '#',
            'novo'           => '#',
            'fornecedores'     => $fornecedores->listaFornecedores()
        ]);
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
            'titulopadrao'   => 'Enrtrada de produtos',
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
        $entrada = new entrada();        
        for($i = 0; $i < count($request->nome); $i ++)
            $entrada->nota_fiscal    = $request->nota_fiscal;
            $entrada->quantidade     = $request->quantidade[$i];
            $entrada->numeroserie    = $request->numeroSerie[$i];
            $entrada->valor          = $request->valor[$i];
            $entrada->garantia       = $request->garantia[$i];
            $entrada->observacoes    = $request->observacoes[$i];
            $entrada->id_produto     = $request->id_produto;
            $entrada->id_user        = $request->id_user;
            $entrada->id_fornecedor  = $request->id_fornecedor;
        
        return view('teste', ['teste' => 0]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function show(entrada $entrada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function edit(entrada $entrada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, entrada $entrada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function destroy(entrada $entrada)
    {
        //
    }
}
