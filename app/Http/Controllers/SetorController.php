<?php

namespace App\Http\Controllers;

use App\Models\setor;
use Illuminate\Http\Request;

class SetorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = setor::join('gerencias as g', 'g.id_setor', '=', 'setores.id_setor')
        ->join('users as u', 'u.id_user', '=', 'g.id_user')
        ->select([
            'setores.id_setor as ID',
            'setores.nome as Nome',
            'u.name as Gerente'
        ])->paginate(10);
        return view('lista', [
            'dados' => $dados,
            'titulopadrao'   => 'Setores cadastrados',
            'caminhoDetalhe' => '/setor/detalhe/',
            'novo'           => '/setor/cadastro'
        ]);
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
     * @param  \App\Models\setor  $setor
     * @return \Illuminate\Http\Response
     */
    public function show(setor $setor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\setor  $setor
     * @return \Illuminate\Http\Response
     */
    public function edit(setor $setor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\setor  $setor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, setor $setor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\setor  $setor
     * @return \Illuminate\Http\Response
     */
    public function destroy(setor $setor)
    {
        //
    }
}
