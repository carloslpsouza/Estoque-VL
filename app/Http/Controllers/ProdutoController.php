<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
    $produto->minimo       = $request->minimo;
    $produto->observacoes  = $request->observacoes;
    $produto->id_categoria = $request->id_categoria;

    $produto->save();
    return redirect(Session::previousUrl())->with('msg', 'Produto salvo com sucesso!');
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
      ->select([
        'produtos.id_produto as ID',
        'produtos.nome as Nome',
        'produtos.minimo as Mínimo',
        'categorias.nome as Categoria'
      ])->paginate(10);
    return view('lista', [
      'dados' => $dados,
      'titulopadrao'   => 'Lista de produtos',
      'caminhoDetalhe' => 'produto/detalhe/',
      'novo'           => 'produto/cadastro'
    ]);
  }
  

  public function jqueryProduto(Request $request)
  {
    $busca = $request->busca;
    $produto = Produto::where('nome', 'LIKE', '%'. $busca. '%')->get();
    $resposta = array();
    foreach($produto as $item){
      $resposta[] = array('value' => $item->id_produto, 'label' => $item->nome);
    }

    return response()->json($resposta);
  }
}
