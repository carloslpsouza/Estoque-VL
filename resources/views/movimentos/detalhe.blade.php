@extends('layouts.main')
@php
    $titulopadrao = 'Detalhes do movimento';
@endphp

@section('title', $titulopadrao)
@section('content')
    <div id="produtos-conteiner" class="col-md-12 offset-md-1">
        <h5>{{ $titulopadrao }}</h5>
        <hr>
        <div class="col-md-10">
            {{--{{dd($movimento)}} --}}
            <p>{{ date('d/m/Y H:i:s', strtotime($movimento[0]->created_at)) }}
                Tipo: {{ $movimento[0]->Tipo }} ID: {{ $movimento[0]->id || $movimento[0]->id_saida }}<br>
                Responsável: {{ $movimento[0]->responsavel }}
            </p>
            <hr>
            <h5> {{ $movimento[0]->nome }}</h5>
            <p>
                Numero de série: {{ $movimento[0]->numeroSerie }}<br>
                Fornecedor: <a href="/fornecedor/detalhe/{{ $movimento[0]->id_fornecedor }}">{{ $movimento[0]->id_fornecedor }} {{ $movimento[0]->fornecedor }}</a><br>
                @php
                    $dataAtual = new DateTime();
                    $dataBanco = new DateTime($movimento[0]->created_at);
                    $diferenca = $dataAtual->diff($dataBanco)->days;
                @endphp

                @if (isset($movimento[0]->garantia))
                    @if ($diferenca < $movimento[0]->garantia)
                        Garantia (em dias): {{ $movimento[0]->garantia }}
                        <span class="text-success"><strong>Em garantia</strong></span>
                    @else
                        Garantia (em dias): {{ $movimento[0]->garantia }}
                        <span class="text-danger"><strong>Fora de garantia</strong></span>
                    @endif
                    <br>
                @endif
                Quantidade: {{ $movimento[0]->quantidade }}<br>
                Observações: {{ $movimento[0]->observacoes }}
            </p>
            <hr>
            <p></p>


            <a href={{ session()->get('_previous.url') }}>voltar</a>
        </div>
    </div>

@endsection
