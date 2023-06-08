@extends('layouts.main')
@section('title', $titulopadrao)
@section('content')
    <div id="produtos-conteiner" class="col-md-12 offset-md-1">
        <h3>{{ $titulopadrao }}</h3>
        <div class="col-md-10">
            <form action="/categoria/save" method="POST">
                @csrf
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name='nome' id="nome" value="{{ old('nome') }}" required>

                <label for="nome">Observações</label>
                <input type="text" class="form-control" name='observacoes' id="observacoes" value="{{ old('observacoes') }}"
                style="text-transform: none"><br>

                <button type="submit" class="btn btn-primary mb-3">Gravar</button>
            </form>
        </div>
        <a href={{ session()->get('_previous.url') }}>voltar</a>
    </div>
    <script src="/js/scripts.js"></script>
    <script src="/js/setor.js"></script>
@endsection
