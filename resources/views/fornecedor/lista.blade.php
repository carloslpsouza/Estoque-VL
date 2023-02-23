@extends('layouts.main')
@php
    $titulopadrao = 'Lista Fornecedores';
@endphp

@section('title', $titulopadrao)
@section('content')
    <div id="produtos-conteiner" class="col-md-12 offset-md-1">
        <h2>{{ $titulopadrao }}</h2>
        <div class="col-md-10">
            <table class="table table-hover">
                <caption>Fornecedores</caption>
                <thead>
                    <tr>
                        <th scope="col">Fornecedor</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fornecedores as $item)
                        <tr>
                            <th scope="row">
                                <a href="/detalhe/{{ $item->id_fornecedor }}">{{ $item->nmf }}</a>
                            </th>
                            <td>
                                {{ $item->email }}
                            </td>
                            <td>
                                {{ $item->nmc }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
