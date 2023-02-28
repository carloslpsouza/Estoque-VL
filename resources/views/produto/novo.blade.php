@extends('layouts.main')
@section('title', $titulopadrao)
@section('content')
    <div id="produtos-conteiner" class="col-md-12 offset-md-1">
        <h3>{{ $titulopadrao }}</h3>
        <div class="col-md-10">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name='nome' id="nome">
            <label for="categoria">Categoria</label>
            <select class="form-select" name="categoria" id="categoria">
                <option value="" selected="disabled">Selecionar</option>
                @foreach ($categoria as $item)
                    <option value="{{ $item->ID }}">{{ $item->Nome }}</option>
                @endforeach
            </select>
            <label for="observacoes">Observações</label>
            <textarea type="text" class="form-control" name='observacoes' id="observacoes"></textarea>
            <button type="submit" class="btn btn-primary mb-3">Gravar</button>
        </div>
        <a href="/">voltar</a>
    </div>

@endsection
