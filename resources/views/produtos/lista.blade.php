@extends('layouts.main')
@php
    $titulopadrao = 'Lista Produtos';
@endphp

@section('title', $titulopadrao)
@section('content')
    <div id="produtos-conteiner" class="col-md-12 offset-md-1">
        <h2>{{ $titulopadrao }}</h2>
        <div class="col-md-10">
            <table class="table table-hover">
                <caption>Lista de produtos</caption>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Categoria</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listaProdutos as $prod)
                        <tr onclick="location.href='/detalhe/{{ $prod->id_produto }}'">
                            <th scope="row">
                                {{ $prod->id_produto }}
                            </th>
                            <td>
                                {{ $prod->nmp }}
                            </td>
                            <td>
                                {{ $prod->nmc }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
