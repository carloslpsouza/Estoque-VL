@extends('layouts.main')
@section('title', $titulopadrao)
@section('content')
    <div id="produtos-conteiner" class="col-md-12 offset-md-1">
        <h3>{{ $titulopadrao }}</h3>
        <div class="col-md-10">
            <form action="/produtoBaixar" method="POST">
                @csrf
                @if (Auth::user()->id_setor == 1)
                    <label for="glpi">
                        <h5>GLPI:</h5>
                    </label>
                    <select name="glpi" id="" class="form-select mb-10">
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                @endif
                <hr>
                @if (session()->get('saidasTemporarias'))
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
                                    Observações
                                </th>
                            </tr>
                        </thead>
                        @foreach (session()->get('saidasTemporarias') as $index => $item)
                            <tr>
                                @foreach ($item as $idx => $it)
                                    @unless ($idx == 'id_user' || $idx == 'id_produto' || $idx == 'id_entrada')
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
                @php
                    var_dump(session()->get('saidasTemporarias'));
                @endphp
                <label for="pesquisa">Pesquisar:</label>
                <input required type="text" class="form-control ui-autocomplete-input" name='pesquisa' id="pesquisa"
                    value="{{ old('pesquisa') }}" placeholder="...">
                <input required class="form-check-input mt-2" type="radio" name="tipo" value="2" id="tipo" checked/>
                <label for="np" class="mt-1">Nome do produto</label>
                <input required class="form-check-input mt-2" type="radio" name="tipo" value="1" id="tipo" />
                <label for="ns" class="mt-1">Número de Série</label>
                <hr>
                <div class="row">
                    <div class="form-group multiple-form-group input-group campos_saida" autocomplete="off">
                        <div class="input-group-btn input-group-select" style="width: 100%">
                            <input required type="number" class="form-control" name='quantidade[]' id="quantidade"
                                value="{{ old('quantidade') }}" placeholder="Qtde" >

                            <input type="text" class="form-control" name='observacoes[]' id="observacoes"
                                value="{{ old('observacoes') }}" placeholder="observações" >
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-success btn-add"><strong>+</strong></button>
                            </span>

                        </div>
                    </div>
                </div>
                <hr>
                @if (session()->get('saidasTemporarias'))
                    <a href="/saida/save"><button type="button" class="btn btn-primary mb-3">Gravar</button></a>
                    <a href="/session/destroy/saidasTemporarias"><button type="button"
                            class="btn btn-danger mb-3">Limpar</button></a>
                @endif
            </form>
        </div>
        <a href="/">voltar</a>
    </div>

    <script type="text/javascript">
        /* $("#fornecedor").select2({
            placeholder: "Selecione o fornecedor",
            allowClear: true
        }); */
    </script>
    <script src="/js/scripts.js"></script>
@endsection
