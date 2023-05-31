@extends('layouts.main')
@php
    $titulopadrao = 'Detalhes do produto';
@endphp

@section('title', $titulopadrao)
@section('content')
    <div id="produtos-conteiner" class="col-md-12 offset-md-1">
        <h5>{{ $titulopadrao }}</h5>
        <hr>
        <div class="col-md-10">
            <p><strong>ID: {{ $produto[0]->ID }} - {{ $produto[0]->nmp }}</strong></p>
            <p> Categoria: {{ $produto[0]->nmc }}</p>
            <h5>Fornecedores: </h5>
            <hr>
            @if (count($fornecedores) > 0)
                <div class="list-group">
                    @foreach ($fornecedores as $item)
                        <a href="#"
                            class="list-group-item list-group-item-action list-group-item-light">{{ $item->nmf }} -
                            {{ $item->email }}</a>
                    @endforeach
                    @if (count($movimentopproduto)>0)
                        <h5>Movimentações: </h5>
                        <hr>
                        <table class="table table-hover">

                            <thead>
                                <tr>
                                    @foreach (json_decode($movimentopproduto[0]) as $key => $value)
                                        @unless($key == 'created_at' || $key == 'updated_at')
                                            <th scope="col">{{ $key }}</th>
                                        @endunless
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($movimentopproduto as $value)
                                    <tr onclick="location.href='..'">

                                        @foreach (json_decode($value) as $key1 => $value1)
                                            @unless($key1 == 'created_at' || $key1 == 'updated_at')
                                                <td>{{ $value1 }}</td>
                                            @endunless
                                        @endforeach

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <a href="#" class="list-group-item list-group-item-action list-group-item-light">Este produto
                            Este produto ainda não foi movimentado.
                        </a>
                    @endif
                @else
                    <a href="#" class="list-group-item list-group-item-action list-group-item-light">Este produto
                        Este produto ainda não tem fornecedor cadastrado.
                    </a>
            @endif
            <a href="/">voltar</a>
        </div>
    </div>

@endsection
