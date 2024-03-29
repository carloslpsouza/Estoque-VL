@extends('layouts.main')
@section('title', 'Estoque VL 1.0')
@section('content')
<div id="produtos-conteiner" class="col-md-1">
    <h4>Painel</h4>
    <div class="list-group">
        <a href="/lista" class="list-group-item d-flex justify-content-between align-items-center">
            Produtos
            <span class="badge bg-primary rounded-pill">{{$contadores['qtdeProdutos']}}</span>
        </a>
        <a href="/estoque" class="list-group-item d-flex justify-content-between align-items-center">
            Estoque
            <span class="badge bg-primary rounded-pill">{{$contadores['qtdeEstoque']}}</span>
        </a>
        <a href="/fornecedores" class="list-group-item d-flex justify-content-between align-items-center">
            Fornecedores
            <span class="badge bg-primary rounded-pill">{{$contadores['qtdeFornecedores']}}</span>
        </a>
        <a href="/emfalta" class="list-group-item d-flex justify-content-between align-items-center">
            Faltando
            <span class="badge bg-primary rounded-pill">{{$contadores['qtdeEmFalta']}}</span>
        </a>
        <a href="/movimentos" class="list-group-item d-flex justify-content-between align-items-center">
            Movimentos
            <span class="badge bg-primary rounded-pill">{{$contadores['qtdeMovimentos']}}</span>
        </a>
    </div>
</div>
@endsection