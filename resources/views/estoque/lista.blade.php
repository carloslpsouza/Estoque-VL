@extends('layouts.main')
@php
    $titulopadrao = 'Estoque';
@endphp

@section('title', $titulopadrao)
@section('content')
    <div id="produtos-conteiner" class="col-md-12 offset-md-1">
        <h2>{{ $titulopadrao }}</h2>
        <div class="col-md-10">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Produto</th>
                        <th scope="col">Quantidade Atual</th>
                        <th scope="col">Mínimo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estoque as $item)
                        <tr>
                            <th scope="row">
                                <a href="/detalhe/{{ $item->id_produto }}">{{ $item->nome }}</a>
                            </th>
                            <td>
                                {{ $item->quantidade }}
                            </td>
                            <td>
                                {{ $item->minimo }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="../">voltar</a>
    </div>

@endsection
