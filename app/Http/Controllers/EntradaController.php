<?php

namespace App\Http\Controllers;

use App\Models\entrada;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
            'titulopadrao'   => 'Entrada de produtos',
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
        $entradasTemporarias = Session::get('entradasTemporarias');

        $entradas = [];
        foreach ($entradasTemporarias as $item) {
            $entrada = [
                'nota_fiscal'   => strval($item['nota_fiscal']),
                'quantidade'    => intval($item['quantidade'][0]),
                'numeroSerie'   => strval($item['numeroserie'][0]),
                'valor'         => intval($item['valor'][0]),
                'garantia'      => intval($item['garantia'][0]),
                'observacoes'   => strval($item['observacoes'][0]),
                'id_produto'    => intval($item['id_produto'][0]),
                'id_user'       => intval($item['id_user']),
                'id_fornecedor' => intval($item['id_fornecedor']),
                'id_setor'      => intval($item['id_setor']),
                'created_at'    => date('Y-m-d H:i:s')
            ];
            /* dd($entrada); */
            $entradas[] = $entrada;
        }

        // Replicar a nota fiscal e o id_user em todos os registros
        $idFornecedor = $entradas[0]['id_fornecedor'];
        $notaFiscal   = $entradas[0]['nota_fiscal'];
        $idUser       = $entradas[0]['id_user'];
        $idSetor      = $entradas[0]['id_setor'];
        foreach ($entradas as &$entrada) {
            $entrada['id_fornecedor'] = $idFornecedor;
            $entrada['nota_fiscal']   = $notaFiscal;
            $entrada['id_user']       = $idUser;
            $entrada['id_setor']      = $idSetor;
        }

        Entrada::insert($entradas);
        Session::forget('entradasTemporarias');
        return redirect('/estoque/entrada')->with('msg', 'Entrada registrada com sucesso!');;
    }



    public function storeTemp(Request $request)
    {
        $id_produto    = intval($request->id_produto); // so retorna 1
        $id_fornecedor = intval($request->id_fornecedor);
        $entradaTemporaria = [
            'nota_fiscal'    => $request->nota_fiscal,
            'quantidade'     => $request->quantidade,
            'nm_setor'       => $request->setor,
            'nome'           => $request->nome,
            'numeroserie'    => $request->numeroSerie,
            'valor'          => $request->valor,
            'garantia'       => $request->garantia,
            'observacoes'    => $request->observacoes,
            'id_produto'     => $request->id_produto,
            'id_user'        => Auth::id(),
            'id_fornecedor'  => $id_fornecedor,
            'id_setor'       => $request->id_setor,
            'nm_fornecedor'  => $request->nm_fornecedor
        ];
        Session::push('entradasTemporarias', $entradaTemporaria);
        //Session::forget('entradasTemporarias');
        return redirect('/estoque/entrada');
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

    public function jqueryEntrada(Request $request)
    {
        $busca = $request->busca;
        if ($request->tipo == "1") {
            $entrada = entrada::where('numeroSerie', 'LIKE', '%' . $busca . '%')->get();
            $resposta = array();
            foreach ($entrada as $item) {
                $nome = Produto::where('id_produto', '=', $item->id_produto)->get('nome');
                $resposta[] = array('value' => $item, 'label' => $item->numeroSerie . " - " . $nome[0]['nome']);
            }
        }
        if ($request->tipo == "2") {
            $entrada = entrada::join('produtos', 'produtos.id_produto', '=', 'entradas.id_produto')
            ->where('produtos.nome', 'LIKE', '%' . $busca . '%')
            ->where('entradas.id_setor', '=', Auth::user()->id_setor)->get();
            $resposta = array();
            foreach ($entrada as $item) {                
                $resposta[] = array('value' => $item, 'label' => $item->numeroSerie." - ".$item->nome);
            }
        }
        return response()->json($resposta);
    }
}
