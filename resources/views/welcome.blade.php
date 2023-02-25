@extends('layouts.main')
@section('title', 'Welcome')
@section('content')
<div id="produtos-conteiner" class="col-md-12 offset-md-1">
    <h3>Estoque</h3>
    <div class="list-group">
        <a href="/lista" class="list-group-item list-group-item-action list-group-item-light">Produtos</a>
        <a href="/estoque" class="list-group-item list-group-item-action list-group-item-light">Estoque</a>
        <a href="/fornecedores" class="list-group-item list-group-item-action list-group-item-light">Fornecedores</a>
    </div>
</div>
@endsection