<?php

namespace App\Http\Controllers;

use App\Models\saida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SaidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fornecedores = new FornecedorController;
        return view('/estoque/saida', [
            'titulopadrao'   => 'Saída de produtos',
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
    $saidasTemporarias = Session::get('saidasTemporarias');

    $saidas = [];
    foreach ($saidasTemporarias as $item) {
        $saida = [
            'quantidade'    => intval($item['quantidade'][0]),
            'numeroSerie'   => strval($item['numeroserie'][0]),
            'id_saida'      => intval($item['id_saida'][0]),
            'observacoes'   => strval($item['observacoes'][0]),
            'id_produto'    => intval($item['id_produto'][0]),
            'id_user'       => intval($item['id_user']),
            'id_setor'      => intval($item['id_setor']),
            'created_at'    => date('Y-m-d H:i:s')
        ];
        /* dd($saida); */
        $saidas[] = $saida;
    }

    $idUser = $saidas[0]['id_user'];
    foreach ($saidas as &$saida) {
        $saida['id_user'] = $idUser;
    }

    saida::insert($saidas);
    Session::forget('saidasTemporarias');
    return redirect('/estoque/saida')->with('msg', 'Saída registrada com sucesso!');;
}



    public function storeTemp(Request $request)
    {
        $id_fornecedor = intval($request->id_fornecedor);
        $saidaTemporaria = [
            'quantidade'     => $request->quantidade,
            'nome'           => $request->nome,
            'numeroserie'    => $request->numeroserie,
            'id_saida'       => $request->id_saida,
            'observacoes'    => $request->observacoes,
            'id_produto'     => $request->id_produto,
            'id_user'        => Auth::id(),
            'id_setor'       => Auth::user()->id_setor
        ];
        Session::push('saidasTemporarias', $saidaTemporaria);
        return redirect('/estoque/saida');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\saida  $saida
     * @return \Illuminate\Http\Response
     */
    public function show(saida $saida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\saida  $saida
     * @return \Illuminate\Http\Response
     */
    public function edit(saida $saida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\saida  $saida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, saida $saida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\saida  $saida
     * @return \Illuminate\Http\Response
     */
    public function destroy(saida $saida)
    {
        //
    }
}
