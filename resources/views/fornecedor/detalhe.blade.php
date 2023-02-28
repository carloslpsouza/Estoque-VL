@extends('layouts.main')
@section('title', $titulopadrao)
@section('content')
    <div id="produtos-conteiner" class="col-md-12 offset-md-1">
        <h3>{{ $titulopadrao }}</h3>
        <hr class="col-md-10">
        <h5>Fornecedor: {{ $fornecedor->nome }}</h5>
        <p>E-mail: {{ $fornecedor->email }}</p>
        <p>Telefone: {{ $fornecedor->telefone }}</p>
        <p>CNPJ: {{ $fornecedor->cnpj }}</p>
        <hr class="col-md-10">
        <h5>Produtos fornecidos:</h5>
        <div class="col-md-10">
            <table class="table table-hover">

                <thead>
                    <tr>
                        @foreach (json_decode($dados[0]) as $key => $value)
                            @unless($key == 'created_at' || $key == 'updated_at')
                                <th scope="col">{{ $key }}</th>
                            @endunless
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dados as $value)
                        <tr onclick="location.href='{{ $caminhoDetalhe.$value->ID }}'">

                            @foreach (json_decode($value) as $key1 => $value1)
                                @unless($key1 == 'created_at' || $key1 == 'updated_at')
                                    <td>{{ $value1 }}</td>
                                @endunless
                            @endforeach

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="/">voltar</a>
    </div>

@endsection
