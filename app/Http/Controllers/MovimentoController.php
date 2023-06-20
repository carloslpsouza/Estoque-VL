<?php

namespace App\Http\Controllers;

use App\Models\entrada;
use App\Models\saida;
use App\Models\Movimento;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MovimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entradas = Entrada::join('produtos', 'produtos.id_produto', '=', 'entradas.id_produto')
            ->join('users', 'users.id_user', '=', 'entradas.id_user')
            ->where('entradas.id_setor', '=', Auth::user()->id_setor)
            ->select(
                'entradas.id as ID',
                DB::raw("'Entrada' as Tipo"),
                'entradas.created_at as Data',
                'entradas.quantidade as QTDE',
                'produtos.nome as Nome',
                'entradas.numeroSerie as N. de série',
                'users.name as Responsável'
            );

        $saidas = Saida::join('produtos', 'produtos.id_produto', '=', 'saidas.id_produto')
            ->join('users', 'users.id_user', '=', 'saidas.id_user')
            ->where('saidas.id_setor', '=', Auth::user()->id_setor)
            ->select(
                'saidas.id_saida as ID',
                DB::raw("'Saída' as Tipo"),
                'saidas.created_at as Data',
                'saidas.quantidade as QTDE',
                'produtos.nome as Nome',
                'saidas.numeroSerie as N. de série',
                'users.name as Responsável'
            );

        $dados = $entradas->union($saidas)
            ->orderBy('Data')
            ->paginate(10);

        return view('lista', [
            'dados' => $dados,
            'titulopadrao'   => 'Movimentos',
            'caminhoDetalhe' => '/movimentos/detalhe/tipo',
            'novo'           => '/estoque/entrada'
        ]);
    }

    public function listaMovPProduto($id_produto)
    {
        $entradas = Entrada::join('produtos', 'produtos.id_produto', '=', 'entradas.id_produto')
            ->join('users', 'users.id_user', '=', 'entradas.id_user')
            ->where('produtos.id_produto', '=', $id_produto)
            ->where('entradas.id_setor', '=', Auth::user()->id_setor)
            ->select(
                DB::raw("'Entrada' as Tipo"),
                'entradas.created_at as Data',
                'entradas.quantidade as QTDE',
                'produtos.nome as Nome',
                'entradas.numeroSerie as N. de série',
                'users.name as Responsável'
            );

        $saidas = Saida::join('produtos', 'produtos.id_produto', '=', 'saidas.id_produto')
            ->join('users', 'users.id_user', '=', 'saidas.id_user')
            ->where('produtos.id_produto', '=', $id_produto)
            ->where('saidas.id_setor', '=', Auth::user()->id_setor)
            ->select(
                DB::raw("'Saída' as Tipo"),
                'saidas.created_at as Data',
                'saidas.quantidade as QTDE',
                'produtos.nome as Nome',
                'saidas.numeroSerie as N. de série',
                'users.name as Responsável'
            );

        $dados = $entradas->union($saidas)
            ->orderBy('Data')
            ->paginate(2);
        return $dados;
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
     * @param  \App\Models\Movimento  $movimento
     * @return \Illuminate\Http\Response
     */
    /* public function show(Movimento $movimento)
    {
        $movimento = Movimento::findOrFail($movimento);
        return $movimento;
    } */
    public function show($tipo, $id)
    {
        $id = intval($id);
        /* dd($id, $tipo); */
        if ($tipo == "Entrada") {            
            $dados = entrada::join('produtos', 'entradas.id_produto', '=', 'produtos.id_produto')
                ->join('users', 'users.id_user', '=', 'entradas.id_user')
                ->join('fornecedores', 'fornecedores.id_fornecedor', '=', 'entradas.id_fornecedor')
                ->where('entradas.id', '=', $id)
                ->get([
                    DB::raw("'Entrada' as Tipo"),
                    'entradas.id',
                    'entradas.nota_fiscal as NF',
                    'entradas.created_at',
                    'entradas.numeroSerie',
                    'entradas.garantia',
                    'entradas.quantidade',
                    'entradas.observacoes',
                    'produtos.nome',
                    'users.name as responsavel',
                    'entradas.id_fornecedor',
                    'fornecedores.nome as fornecedor'
                ]);
        } else {
            $dados = saida::join('produtos', 'saidas.id_produto', '=', 'produtos.id_produto')
                ->join('users', 'users.id_user', '=', 'saidas.id_user')
                ->where('saidas.id_saida', '=', $id)
                ->get([
                    DB::raw("'Saída' as Tipo"),
                    'saidas.id_saida',
                    'saidas.created_at',
                    'saidas.numeroSerie',
                    'saidas.id_entrada',
                    'saidas.quantidade',
                    'saidas.observacoes',
                    'produtos.nome',
                    'users.name as responsavel'
                ]);
        }
        $fornecedores = new ForneceProdutoController;
        return view('movimentos.detalhe', [
            'movimento' => $dados,
            'fornecedores' => $fornecedores->show($id),
            'movimentopproduto' => '$movimento->listaMovPProduto($id)'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movimento  $movimento
     * @return \Illuminate\Http\Response
     */
    public function edit(Movimento $movimento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movimento  $movimento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movimento $movimento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movimento  $movimento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movimento $movimento)
    {
        //
    }
}
