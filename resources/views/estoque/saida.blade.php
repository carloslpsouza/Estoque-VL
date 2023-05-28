@extends('layouts.main')
@section('title', $titulopadrao)
@section('content')
    <div id="produtos-conteiner" class="col-md-12 offset-md-1">
        <h3>{{ $titulopadrao }}</h3>
        <div class="col-md-10">
            <form action="/produtoIncluir" method="POST">
                @csrf
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
                        @foreach (session()->get('entradasTemporarias') as $index => $item)
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
                <label for="pesquisa">Pesquisar:</label>
                <input required type="text" class="form-control ui-autocomplete-input" name='pesquisa' id="pesquisa"
                    value="{{ old('pesquisa') }}" placeholder="?">
                <input class="form-check-input" type="radio" name="tipo" value="1" id="ns"/><label for="ns">Número de Série</label>
                <input class="form-check-input" type="radio" name="tipo" value="2" id="cp"/><label for="cp">Código do produto</label>
                <input class="form-check-input" type="radio" name="tipo" value="3" id="np"/><label for="np">Nome do produto</label>
                    <hr>
                @if (Auth::user()->id_setor == 1)
                    <label for="glpi">GLPI:</label>
                    <select name="glpi" id="" class="form-select mb-10">
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                @endif

                <div class="row">
                    <div class="form-group multiple-form-group input-group campos_entrada" autocomplete="off">
                        <div class="input-group-btn input-group-select" style="width: 100%">
                            {{-- <input required type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                            <input required type="number" class="form-control" name='quantidade[]' id="quantidade"
                                value="{{ old('quantidade') }}" placeholder="Qtde" style="width: 20%">

                            <input type="text" class="form-control" name='observacoes[]' id="observacoes"
                                value="{{ old('observacoes') }}" placeholder="observações" style="width: 75.1%">
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

    <script type="text/javascript">
        $("#fornecedor").select2({
            placeholder: "Selecione o fornecedor",
            allowClear: true
        });
    </script>
    <script src="/js/scripts.js"></script>
@endsection
