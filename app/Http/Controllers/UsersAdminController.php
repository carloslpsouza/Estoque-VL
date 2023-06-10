<?php

namespace App\Http\Controllers;

use App\Models\setor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UsersAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = User::join('setores as st', 'st.id_setor', '=', 'users.id_setor')
        ->select([
            'users.id_user as ID',
            'users.name as Nome',
            'users.email as E-mail',
            'st.nome as Setor'
        ])
        ->paginate(10);
        return view('lista', [
            'dados' => $dados,
            'titulopadrao'   => 'Usuários cadastrados',
            'caminhoDetalhe' => '#',
            'novo'           => '/users/cadastro'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/user/cadastro', [
            'titulopadrao' => 'Novo usuário'
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
        $user = new User;

        $user->name        = $request->nome;
        $user->email       = $request->email;
        $user->password    = bcrypt($request->password);
        $user->id_setor    = $request->id_setor;

        $user->save();
        return redirect(Session::previousUrl())->with('msg', 'Usuário salvo com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function jqueryUser(Request $request)
    {
        $busca = $request->busca;
        $user = User::where('name', 'LIKE', '%' . $busca . '%')->get();
        $resposta = array();
        foreach ($user as $item) {
            $setor = setor::where('id_setor', '=', $item->id_setor)->get('nome');
            $resposta[] = array('value' => $item->id_user, 'label' => $item->name." - ".$setor[0]['nome']);
        }

        return response()->json($resposta);
    }
}
