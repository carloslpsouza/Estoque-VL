@extends('layouts.main')
@php
    $titulopadrao = 'Detalhe Produtos - ID: ' . $produto[0]->id_produto . ' - ' . $produto[0]->nmp;
@endphp

@section('title', $titulopadrao)
@section('content')
    <div id="produtos-conteiner" class="col-md-12 offset-md-1">
        <h4>{{ $titulopadrao }}</h4>
        <hr>
        <div class="col-md-10">
            <p>ID: {{ $produto[0]->id_produto }} Categoria: {{ $produto[0]->nmc }}</p>
            <h4>Fornecedores: </h4>
            <hr>
            @if (count($fornecedores)>0)
            <div class="list-group">
              @foreach ($fornecedores as $item)
                  <a href="#"
                      class="list-group-item list-group-item-action list-group-item-light">{{ $item->nmf }} -
                      {{ $item->email }}</a>
              @endforeach
              
          </div>
            @else
            <a href="#"
            class="list-group-item list-group-item-action list-group-item-light">Este produto ainda não tem fornecedor cadastrado.</a>
            @endif
            <a href="/lista">voltar</a>
        </div>
    </div>

@endsection
