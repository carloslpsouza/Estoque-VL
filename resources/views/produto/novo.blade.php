@extends('layouts.main')
@section('title', $titulopadrao)
@section('content')
    <div id="produtos-conteiner" class="col-md-12 offset-md-1">
        <h3>{{ $titulopadrao }}</h3>
        <div class="col-md-10">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name='nome' id="nome">
            <label for="categoria">Categoria</label>
            <select name="categorias" id="categorias" class="form-select form-select-lg mb-10">
                <option selected></option>
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script type="text/javascript">
        $("#categorias").select2({
            placeholder: "Selecione a categoria",
            allowClear: true
        });
    </script>

@endsection
