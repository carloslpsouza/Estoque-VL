<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
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
    $categoria = new CategoriaController;
    return view('produto/novo', [
      'titulopadrao' => 'Novo produto',
      'categoria' => $categoria->listaCategoria()
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
    $produto = new Produto;

    $produto->nome         = $request->nome;
    $produto->observacoes  = $request->observacoes;
    $produto->id_categoria = $request->id_categoria;

    $produto->save();
    return redirect('/')->with('msg', 'Produto salvo com sucesso!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Produto  $produto
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $produto = Produto::join('categorias', 'produtos.id_categoria', '=', 'categorias.id_categoria')
      ->where('id_produto', '=', $id)
      ->get([
        'produtos.id_produto as ID',
        'produtos.nome as nmp',
        'produtos.minimo as Mínimo',
        'categorias.nome as nmc',
      ]);
    $fornecedores = new ForneceProdutoController;
    $movimento = new MovimentoController;
    return view('produto.detalhe', [
      'produto' => $produto,
      'fornecedores' => $fornecedores->show($id),
      'movimentopproduto' => $movimento->listaMovPProduto($id)
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Produto  $produto
   * @return \Illuminate\Http\Response
   */
  public function edit(Produto $produto)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Produto  $produto
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Produto $produto)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Produto  $produto
   * @return \Illuminate\Http\Response
   */
  public function destroy(Produto $produto)
  {
    //
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function listaProdutos()
  {
    $dados = Produto::join('categorias', 'produtos.id_categoria', '=', 'categorias.id_categoria')
      ->get([
        'produtos.id_produto as ID',
        'produtos.nome as Nome',
        'produtos.minimo as Mínimo',
        'categorias.nome as Categoria'
      ]);
    return view('lista', [
      'dados' => $dados,
      'titulopadrao'   => 'Lista de produtos',
      'caminhoDetalhe' => 'produto/detalhe/',
      'novo'           => 'produto/cadastro'
    ]);
  }

  public function ajaxProduto(Request $request)
  {
    $busca = $request->busca;
    /* if($busca == ''){
      $produto = Produto::orderby('nome', 'asc')->select('id_produto', 'nome')->limit(2)->get();
    }else{
      $produto = Produto::orderby('nome', 'asc')->select('id_produto', 'nome')->where('nome', 'like', '%')->limit(2)->get();
    } */
    $produto = Produto::where('nome', 'LIKE', '%'. $busca. '%')->get();
    $resposta = array();
    foreach($produto as $item){
      $resposta[] = array('value' => $item->id_produto, 'label' => $item->nome);
    }

    return response()->json($resposta);
  }
}
