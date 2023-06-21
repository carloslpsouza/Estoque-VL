@extends('layouts.main')
@section('title', $titulopadrao)
@section('content')
    <div id="produtos-conteiner" class="col-md-12 offset-md-1">
        <h3>{{ $titulopadrao }}</h3>
        <div class="col-md-10">
            <form action="{{ $action }}" method="POST">
                @csrf
                @foreach ($campos as $key => $value)
                    @if ($key == 'select2')
                        <label for="{{ $key }}">{{ $value['label'] }}</label>
                        <select name='{{ $key }}' id='{{ $key }}' class="form-select form-select-md mb-10">
                            <option value=""></option>
                            @foreach ($value['value'] as $item)
                                <option value="{{ $item->id_setor }}">{{ $item->nome }}</option>
                            @endforeach
                        </select>
                    @else
                        @if ($value['type'] != 'hidden')
                            <label for="{{ $key }}">{{ $value['label'] }}</label>
                        @endif
                        <input type={{ $value['type'] }} class="form-control" name='{{ $key }}'
                            id="{{ $key }}" value="{{ $value['value'] }}" required>
                    @endif
                @endforeach


                <br><br>
                <button type="submit" class="btn btn-primary mb-3">Gravar</button>
            </form>
        </div>
        <a href={{ session()->get('_previous.url') }}>voltar</a>
    </div>
    <script src="/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $("#select2").select2({
            placeholder: "Selecione",
            allowClear: true
        });
    </script>
@endsection
