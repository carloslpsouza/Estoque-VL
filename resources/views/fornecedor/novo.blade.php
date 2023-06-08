@extends('layouts.main')
@section('title', $titulopadrao)
@section('content')
    <div id="produtos-conteiner" class="col-md-12 offset-md-1">
        <h3>{{ $titulopadrao }}</h3>
        <div class="col-md-10">
            <form action="save" method="POST">
                @csrf
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name='nome' id="nome"  value="{{ old('nome') }}">

                <label for="email">E-mail</label>
                <input type="email" class="form-control" name='email' id="email"  value="{{ old('email') }}">

                <label for="cnpj">CNPJ</label>
                <input type="text" class="form-control" name='cnpj' id="cnpj"  value="{{ old('cnpj') }}">

                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" name='telefone' id="telefone"  value="{{ old('telefone') }}">

                <label for="observacoes"  value="{{ old('observacoes') }}">Observações</label>
                <textarea type="text" class="form-control" name='observacoes' id="observacoes"></textarea>
                <br>
                <button type="submit" class="btn btn-primary mb-3">Gravar</button>
            </form>
        </div>
        <a href={{session()->get('_previous.url')}}>voltar</a>
    </div>


@endsection
