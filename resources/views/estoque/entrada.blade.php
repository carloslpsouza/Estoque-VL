@extends('layouts.main')
@section('title', $titulopadrao)
@section('content')
    <div id="produtos-conteiner" class="col-md-12 offset-md-1">
        <h3>{{ $titulopadrao }}</h3>
        <div class="col-md-10">
            <form action="/produtoIncluir" method="POST">
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
                {{-- @php
                    var_dump(session()->get('entradasTemporarias'));
                @endphp --}}
                @if (session()->get('entradasTemporarias'))
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">
                                    QT
                                </th>
                                <th scope="col">
                                    Nome
                                </th>
                                <th scope="col">
                                    N/S
                                </th>
                                <th scope="col">
                                    Valor
                                </th>
                                <th scope="col">
                                    Garantia
                                </th>
                                <th scope="col">
                                    Observações
                                </th>
                            </tr>
                        </thead>
                        @php
                            /* print_r(session()->get('entradasTemporarias')); */
                        @endphp

                        @foreach (session()->get('entradasTemporarias') as $index => $item)
                            {{ $index }}
                            <tr>
                                @foreach ($item as $idx => $it)
                                    @unless ($idx == 'id_user' || $idx == 'id_fornecedor' || $idx == 'nota_fiscal' || $idx == 'id_produto')
                                        @if (is_array($it))
                                            <td>{{ $it[0] }}</td>
                                        @else
                                            <td>{{ $it }}</td>
                                        @endif
                                    @endunless
                                @endforeach
                            </tr>
                        @endforeach

                    </table>
                @endif

                <div class="row">
                    <div class="form-group multiple-form-group input-group campos_entrada" autocomplete="off">
                        <div class="input-group-btn input-group-select">
                            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                            <input type="number" class="form-control" name='quantidade[]' id="quantidade"
                                value="{{ old('quantidade') }}" placeholder="qt">

                            <input type="text" class="form-control" name='numeroSerie[]' id="numerodeserie"
                                value="{{ old('numerodeserie') }}" placeholder="Núm de série">

                            <input type="text" class="form-control ui-autocomplete-input" name='nome[]' id="nome"
                                value="{{ old('nome') }}" placeholder="Nome" autocomplete="off">
                            <input type="hidden" name='id_produto[]' id="id-produto">

                            <input type="number" class="form-control" name='valor[]' id="valor"
                                value="{{ old('valor') }}" placeholder="valor">

                            <input type="number" class="form-control" name='garantia[]' id="garantia"
                                value="{{ old('garantia') }}" placeholder="garantia">

                            <input type="text" class="form-control" name='observacoes[]' id="observacoes"
                                value="{{ old('observacoes') }}" placeholder="observações">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-success btn-add"><strong>+</strong></button>
                            </span>

                        </div>
                    </div>
                </div>
                <a href="/entrada/save"><button type="button" class="btn btn-primary mb-3">Gravar</button></a>
            </form>
        </div>
        <a href="/">voltar</a>
    </div>
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> --}}

    <script type="text/javascript">
        $("#fornecedor").select2({
            placeholder: "Selecione o fornecedor",
            allowClear: true
        });
    </script>
    {{-- <script src="/js/campos.js"></script> --}}
    <script src="/js/scripts.js"></script>
@endsection
