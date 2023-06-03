<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\forneceProduto;
use Illuminate\Http\Request;

class ForneceProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\forneceProduto  $forneceProduto
     * @return \Illuminate\Http\Response
     */
    public function show($produto)
    {
        $fornecedores = Fornecedor::join('entradas', 'fornecedores.id_fornecedor', '=','entradas.id_fornecedor')
        ->where('entradas.id_produto', '=', $produto)
        ->groupBy('fornecedores.id_fornecedor', 'fornecedores.nome', 'fornecedores.cnpj', 'fornecedores.email')
        ->get([
            'fornecedores.id_fornecedor',
            'fornecedores.nome as nmf',
            'fornecedores.cnpj as CNPJ',
            'fornecedores.email'
        ]);
        return $fornecedores;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\forneceProduto  $forneceProduto
     * @return \Illuminate\Http\Response
     */
    public function edit(forneceProduto $forneceProduto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\forneceProduto  $forneceProduto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, forneceProduto $forneceProduto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\forneceProduto  $forneceProduto
     * @return \Illuminate\Http\Response
     */
    public function destroy(forneceProduto $forneceProduto)
    {
        //
    }
}
