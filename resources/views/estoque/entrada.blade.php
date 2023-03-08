@extends('layouts.main')
@section('title', $titulopadrao)
@section('content')
    <div id="produtos-conteiner" class="col-md-12 offset-md-1">
        <h3>{{ $titulopadrao }}</h3>
        <div class="col-md-10">
            <form action="/movimento/save" method="POST">
                @csrf
                <label for="nome">Nota Fiscal</label>
                <input type="text" class="form-control" name='nota_fiscal' id="notafiscal" value="{{ old('notafiscal') }}">
                <label for="fornecedor">Fornecedor</label>
                <select name="id_fornecedor" id="fornecedor" class="form-select form-select-lg mb-10"
                    value="{{ old('id_fornecedor') }}">
                    <option selected></option>
                    @foreach ($fornecedores as $item)
                        <option value="{{ $item->ID }}">{{ $item->Nome }}-{{ $item->cnpj }}</option>
                    @endforeach
                </select>
                <hr>

                <div class="row">
                    <div class="form-group multiple-form-group input-group campos_entrada">
                        <div class="input-group-btn input-group-select">
                            <input type="number" class="form-control" name='quantidade[]' id="quantidade"
                                value="{{ old('quantidade') }}" placeholder="qt">
                            <input type="text" class="form-control" name='numeroSerie[]' id="numerodeserie"
                                value="{{ old('numerodeserie') }}" placeholder="Núm de série">
                            <input type="text" class="form-control" name='nome[]' id="nome"
                                value="{{ old('nome') }}" placeholder="Nome">
                            <input type="number" class="form-control" name='valor[]' id="valor"
                                value="{{ old('valor') }}" placeholder="valor">
                            <input type="number" class="form-control" name='garantia[]' id="garantia"
                                value="{{ old('garantia') }}" placeholder="garantia">
                            <input type="text" class="form-control" name='observacoes[]' id="observacoes"
                                value="{{ old('observacoes') }}" placeholder="observações">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-success btn-add"><strong>+</strong></button>
                            </span>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mb-3">Gravar</button>
            </form>
        </div>
        <a href="/">voltar</a>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script type="text/javascript">
        $("#fornecedor").select2({
            placeholder: "Selecione o fornecedor",
            allowClear: true
        });
    </script>
    <script src="/js/campos.js"></script>
@endsection
