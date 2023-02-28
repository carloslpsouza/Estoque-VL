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
                <label for="categoria">Categoria</label>
                <select name="id_categoria" id="categorias" class="form-select form-select-lg mb-10"  value="{{ old('id_categoria') }}">
                    <option selected></option>
                    @foreach ($categoria as $item)
                        <option value="{{ $item->ID }}">{{ $item->Nome }}</option>
                    @endforeach
                </select>
                <label for="observacoes"  value="{{ old('observacoes') }}">Observações</label>
                <textarea type="text" class="form-control" name='observacoes' id="observacoes"></textarea>
                <button type="submit" class="btn btn-primary mb-3">Gravar</button>
            </form>
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
