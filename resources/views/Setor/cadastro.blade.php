@extends('layouts.main')
@section('title', $titulopadrao)
@section('content')
    <div id="produtos-conteiner" class="col-md-12 offset-md-1">
        <h3>{{ $titulopadrao }}</h3>
        <div class="col-md-10">
            <form action="/setor/save" method="POST">
                @csrf
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name='nome' id="nome" value="{{ old('nome') }}" required>

                <label for="setor">Gerente</label>
                <input type="text" class="form-control" name='gerente' id="gerente" value="{{ old('gerente') }}" required><br>
                <input required type="hidden" name='id_user' id="id-gerente">

                <button type="submit" class="btn btn-primary mb-3">Gravar</button>
            </form>
        </div>
        <a href={{ session()->get('_previous.url') }}>voltar</a>
    </div>
    <script src="/js/scripts.js"></script>
    <script src="/js/user.js"></script>
@endsection
