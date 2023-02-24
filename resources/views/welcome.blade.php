@extends('layouts.main')
@section('title', 'Welcome')
@section('content')
<div id="produtos-conteiner" class="col-md-12 offset-md-1">
    <h3>Estoque</h3>
    <div class="list-group">
        <a href="/lista" class="list-group-item list-group-item-action list-group-item-light">Lista produtos</a>
        <a href="/estoque" class="list-group-item list-group-item-action list-group-item-light">Estoque</a>
    </div>
</div>
@endsection