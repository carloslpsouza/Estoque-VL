<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produto;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Fornecedor::select([
            'id_fornecedor as ID',
            'nome as Nome',
            'fornecedores.cnpj as CNPJ',
            'email as Email',
            'telefone as Telefone'
        ])->paginate(10);
        return view('lista', [
            'dados' => $dados,
            'titulopadrao' => 'Fornecedores',
            'caminhoDetalhe' => 'fornecedor/detalhe/',
            'novo'           => 'fornecedor/cadastro'
        ]);
    }

    public function listaFornecedores()
    {
        $fornecedores = Fornecedor::get([
            'id_fornecedor as ID',
            'nome as Nome',
            'cnpj'
        ]);
        return $fornecedores;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fornecedor/novo', [
            'titulopadrao' => 'Novo Fornecedor'
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
        $fornecedor = new Fornecedor;

        $fornecedor->nome          = $request->nome;
        $fornecedor->email         = $request->email;
        $fornecedor->cnpj          = $request->cnpj;
        $fornecedor->telefone      = $request->telefone;
        $fornecedor->observacoes   = $request->observacoes;

        $fornecedor->save();

        return redirect('/')->with('msg', 'Fornecedor salvo com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fornecedor = Fornecedor::find($id);
        $dados = Produto::join('entradas', 'produtos.id_produto', '=', 'entradas.id_produto')
            ->where('entradas.id_fornecedor', '=', $id)
            ->groupBy('produtos.id_produto', 'produtos.nome', 'produtos.observacoes')
            ->get([
                'produtos.id_produto as ID',
                'produtos.nome as Nome',
                'produtos.observacoes as Observações'
            ]);
        return view('fornecedor/detalhe', [
            'dados'          => $dados,
            'fornecedor'     => $fornecedor,
            'titulopadrao'   => 'Detalhes fornecedor',
            'caminhoDetalhe' => '../../produto/detalhe/'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Fornecedor $fornecedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fornecedor $fornecedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fornecedor $fornecedor)
    {
        //
    }

    public function jqueryFornecedor(Request $request)
    {
      $busca = $request->busca;
      $fornecedor = Fornecedor::where('nome', 'LIKE', '%'. $busca. '%')->get();
      $resposta = array();
      foreach($fornecedor as $item){
        $resposta[] = array('value' => $item->id_fornecedor, 'label' => $item->cnpj." - ".$item->nome);
      }
  
      return response()->json($resposta);
    }
}
