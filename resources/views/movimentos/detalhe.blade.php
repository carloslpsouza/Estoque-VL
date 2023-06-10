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
            {{-- {{dd($movimento)}} --}}
            <p>{{ date('d/m/Y H:i:s', strtotime($movimento[0]->created_at)) }} Tipo: {{ $movimento[0]->Tipo }} ID:
                {{ $movimento[0]->id }}</p>
            <hr>
            <h5> {{ $movimento[0]->nome }}</h5>
            <p>
                Numero de série: {{ $movimento[0]->numeroSerie }}<br>
                Garantia (em dias): {{ $movimento[0]->garantia }}
                @php
                    $dataAtual = new DateTime();
                    $dataBanco = new DateTime($movimento[0]->created_at);
                    $diferenca = $dataAtual->diff($dataBanco)->days;
                @endphp

                @if ($diferenca < $movimento[0]->garantia)
                    <span class="text-success"><strong>Em garantia</strong></span>
                @else
                <span class="text-danger"><strong>Fora de garantia</strong></span>
                @endif
                <br>
                Quantidade: {{ $movimento[0]->quantidade }}<br>
                Observações: {{ $movimento[0]->observacoes }}
            </p>
            <hr>
            <p>Responsável: {{ $movimento[0]->responsavel }}</p>


            <a href={{ session()->get('_previous.url') }}>voltar</a>
        </div>
    </div>

@endsection
