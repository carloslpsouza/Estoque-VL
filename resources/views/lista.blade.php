@extends('layouts.main')
@section('title', $titulopadrao)
@section('content')
    <div id="produtos-conteiner" class="col-md-12 offset-md-1">
        <h3>{{ $titulopadrao }}</h3>
        <hr>
        <div class="col-md-10">
            <table class="table table-hover">

                @if (count($dados) > 0)
                    <thead>
                        <tr>
                            @foreach (json_decode($dados[0]) as $key => $value)
                                @unless ($key == 'created_at' || $key == 'updated_at' || $key == 'profile_photo_url')
                                    <th scope="col">{{ $key }}</th>
                                @endunless
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dados as $value)
                            @php
                             $caminho = str_replace('tipo'.$value->ID, $value->Tipo.'/'.$value->ID, $caminhoDetalhe.$value->ID)    
                            @endphp
                            <tr onclick="location.href='{{ $caminho }}'">

                                @foreach (json_decode($value) as $key1 => $value1)
                                    @unless ($key1 == 'created_at' || $key1 == 'updated_at' || $key1 == 'profile_photo_url')
                                        <td>{{ $value1 }}</td>
                                    @endunless
                                @endforeach

                            </tr>
                        @endforeach
                    </tbody>
                @else
                    <p>Não foram encontrados {{ $titulopadrao }}</p>
                @endif
            </table>
        </div>
        @if (method_exists($dados, 'links'))
            @if ($dados->lastPage() > 0)
                {{ $dados->links('./components.pagination') }}
            @endif
        @endif
        <a href={{session()->get('_previous.url')}}>voltar</a>
        @if ($novo)
            <a href="{{ $novo }}"> novo</a>
        @endif
    </div>

@endsection
