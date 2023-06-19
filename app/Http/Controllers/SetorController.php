<?php

namespace App\Http\Controllers;

use App\Models\Gerencia;
use App\Models\setor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
            'caminhoDetalhe' => '/setor/detalhe',
            'novo'           => '/setor/cadastro'
        ]);
    }

    public function listaSetor()
    {
        $setor = setor::all();
        return $setor;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/Setor/cadastro', [
            'titulopadrao' => 'Novo setor'
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
        $setor = new setor;
        $gerencias = new Gerencia;

        $setor->nome  = strtoupper($request->nome);
        $id_user      = $request->id_user;
        $setor->save();
        $lastInsertId = $setor->getConnection()->getPdo()->lastInsertId();

        $gerencias->id_user  = $id_user;
        $gerencias->id_setor = $lastInsertId;
        $gerencias->save();
        
        return redirect('/setor')->with('msg', 'Usuário salvo com sucesso!');
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

    public function showName($id){
        $setor = setor::where('id_setor', '=', $id)->get('nome');
        return $setor;
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
    
    public function jquerySetor(Request $request)
    {
        $busca = $request->busca;
        $setor = setor::where('nome', 'LIKE', '%' . $busca . '%')->get();
        $resposta = array();
        foreach ($setor as $item) {
            $resposta[] = array('value' => $item->id_setor, 'label' => $item->nome);
        }

        return response()->json($resposta);
    }
}
