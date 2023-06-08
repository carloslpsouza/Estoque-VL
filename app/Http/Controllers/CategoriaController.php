<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Categoria::select([
            'id_categoria as ID',
            'nome as Nome',
            'observacoes as Observações'
        ])->paginate(10);
        return view('lista', [
            'dados' => $dados,
            'titulopadrao'   => 'Categorias cadastradas',
            'caminhoDetalhe' => '/categoria/detalhe/',
            'novo'           => '/categoria/cadastro'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/categoria/cadastro', [
            'titulopadrao' => 'Nova categoria'
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
        $categoria = new Categoria();
    
        $categoria->nome        = $request->nome;
        $categoria->observacoes = $request->email;
        
        $categoria->save();
        return redirect('/categoria')->with('msg', 'Categoria salva com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    public function listaCategoria()
    {
        $categoria = Categoria::get([
            'categorias.id_categoria as ID',
            'categorias.nome as Nome'
        ]);
        return $categoria;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        //
    }
}
