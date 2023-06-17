@extends('layouts.main')
@section('title', $titulopadrao)
@section('content')
    <div id="produtos-conteiner" class="col-md-12 offset-md-1">
        <h3>{{ $titulopadrao }}</h3>
        <div class="col-md-10">
            <form action="/users/save" method="POST">
                @csrf
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name='nome' id="nome" value="{{ old('nome') }}"
                    style="text-transform: none" required>

                <label for="nome">Email</label>
                <input type="email" class="form-control" name='email' id="email" value="{{ old('email') }}"
                    style="text-transform: lowercase" required>

                <label for="password">Senha</label>
                <input type="password" class="form-control" name='password' id="password" value="{{ old('password') }}"
                    style="text-transform: none" required placeholder="8 caracteres">

                <label for="setor">Setor</label>
                <select name="id_setor" id="setor" class="form-select form-select-md mb-10">
                    <option selected></option>
                    @foreach ($setores as $setor)
                        <option value="{{ $setor->id_setor }}">{{ $setor->nome }}</option>
                    @endforeach
                </select>
                <br><br>
                <button type="submit" class="btn btn-primary mb-3">Gravar</button>
            </form>
        </div>
        <a href={{ session()->get('_previous.url') }}>voltar</a>
    </div>
    <script src="/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $("#setor").select2({
            placeholder: "Selecione o setor",
            allowClear: true
        });
    </script>
@endsection
