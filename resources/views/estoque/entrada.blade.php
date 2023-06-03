@extends('layouts.main')
@section('title', $titulopadrao)
@section('content')
    <div id="produtos-conteiner" class="col-md-12 offset-md-1">
        <h3>{{ $titulopadrao }}</h3>
        <div class="col-md-10">
            <form action="/produtoIncluir" method="POST">
                @csrf
                @if (session()->get('entradasTemporarias'))
                    <h3>Nota Fiscal: {{ session()->get('entradasTemporarias.0.nota_fiscal') }}</h3>
                    <p><strong>Fornecedor: ID: {{ session()->get('entradasTemporarias.0.id_fornecedor') }} CNPJ: {{ session()->get('entradasTemporarias.0.nm_fornecedor') }}</strong></p>
                @else
                    <label for="nome">Nota fiscal</label>
                    <input required type="text" class="form-control" name='nota_fiscal' id="notafiscal"
                        value="{{ old('notafiscal') }}">
                    <label for="fornecedor">Fornecedor</label>
                    <input required type="text" class="form-control ui-autocomplete-input" name='fornecedor'
                        id="fornecedor" value="{{ old('fornecedor') }}" autocomplete="off">
                    <input required type="hidden" name='id_fornecedor' id="id-fornecedor">
                    <input required type="hidden" name='nm_fornecedor' id="nm-fornecedor">
                @endif
                <hr>
                @php
                    //var_dump(session()->get('entradasTemporarias'));
                @endphp
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
                            /* print_r(session()->all()); */
                        @endphp

                        @foreach (session()->get('entradasTemporarias') as $index => $item)
                            <tr>
                                @foreach ($item as $idx => $it)
                                    @unless ($idx == 'id_user' || $idx == 'id_fornecedor' || $idx == 'nota_fiscal' || $idx == 'id_produto' || $idx == 'nm_fornecedor')
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
                <label for="nome">Nome do produto:</label>
                <input required type="text" class="form-control ui-autocomplete-input" name='nome[]' id="nome"
                    value="{{ old('nome') }}" placeholder="Nome" autocomplete="off">
                <input required type="hidden" name='id_produto[]' id="id-produto">

                <div class="row">
                    <div class="form-group multiple-form-group input-group campos_entrada" autocomplete="off">
                        <div class="input-group-btn input-group-select">
                            {{-- <input required type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                            <input required type="number" class="form-control" name='quantidade[]' id="quantidade"
                                value="{{ old('quantidade') }}" placeholder="qt">

                            <input required type="text" class="form-control" name='numeroSerie[]' id="numerodeserie"
                                value="{{ old('numerodeserie') }}" placeholder="Núm de série">

                            <input required type="number" class="form-control" name='valor[]' id="valor"
                                value="{{ old('valor') }}" placeholder="valor">

                            <input required type="number" class="form-control" name='garantia[]' id="garantia"
                                value="{{ old('garantia') }}" placeholder="garantia">

                            <input type="text" class="form-control" name='observacoes[]' id="observacoes"
                                value="{{ old('observacoes') }}" placeholder="observações">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-success btn-add"><strong>+</strong></button>
                            </span>

                        </div>
                    </div>
                </div>
                <hr>
                @if (session()->get('entradasTemporarias'))
                    <a href="/entrada/save"><button type="button" class="btn btn-primary mb-3">Gravar</button></a>
                    <a href="/session/destroy/entradasTemporarias"><button type="button"
                            class="btn btn-danger mb-3">Limpar</button></a>
                @endif
            </form>
        </div>
        <a href="/">voltar</a>
    </div>

    <script src="/js/scripts.js"></script>
@endsection
