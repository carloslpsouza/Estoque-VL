@extends('layouts.main')
@section('title', $titulopadrao)
@section('content')
    <div id="produtos-conteiner" class="col-md-12 offset-md-1">
        <h3>{{ $titulopadrao }}</h3>
        <div class="col-md-10">
            <table class="table table-hover">

                <thead>
                    <tr>
                        @foreach (json_decode($dados[0]) as $key => $value)
                            <th scope="col">{{ $key }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dados as $value)

                        <tr onclick="location.href='/detalhe/{{$value->ID}}'">

                            @foreach (json_decode($value) as $key1 => $value1)
                                <td>{{ $value1 }}</td>
                            @endforeach

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="/">voltar</a>
    </div>

@endsection
