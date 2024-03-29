<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- Jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Compiled and minified JavaScript -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Local styles -->
    <link href="/css/sidebars.css" rel="stylesheet">
    <link href="/css/pagination.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">

    {{-- Outros --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <div class="conteiner-fluid">
        <div class="row">
            @if (session('msg'))
                <p class="msg">{{ session('msg') }}</p>
            @endif
        </div>

        {{-- nav --}}

        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="bootstrap" viewBox="0 0 118 94">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z">
                </path>
            </symbol>
            <symbol id="home" viewBox="0 0 16 16">
                <path
                    d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
            </symbol>
            <symbol id="table" viewBox="0 0 16 16">
                <path
                    d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z" />
            </symbol>
            <symbol id="market" viewBox="0 0 16 16">
                <path
                    d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
            </symbol>
        </svg>

        <main class="d-flex flex-nowrap">
            <div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
                <a href="/"
                    class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                    <svg class="bi pe-none me-2" width="30" height="24">
                        <use xlink:href="#market" />
                    </svg>
                    <span class="fs-5 fw-semibold">Estoque VL 1.0</span>
                </a>
                <ul class="list-unstyled ps-0">
                    <li class="mb-1">
                        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                            data-bs-toggle="collapse" data-bs-target="#produto-collapse" aria-expanded="false">
                            Produtos
                        </button>
                        <div class="collapse" id="produto-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="/produto/cadastro"
                                        class="link-dark d-inline-flex text-decoration-none rounded">Cadastrar</a></li>
                                <li><a href="/lista"
                                        class="link-dark d-inline-flex text-decoration-none rounded">Listar</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                            data-bs-toggle="collapse" data-bs-target="#fornecedor-collapse" aria-expanded="false">
                            Fornecedores
                        </button>
                        <div class="collapse" id="fornecedor-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="/fornecedor/cadastro"
                                        class="link-dark d-inline-flex text-decoration-none rounded">Cadastrar</a></li>
                                <li><a href="/fornecedores"
                                        class="link-dark d-inline-flex text-decoration-none rounded">Listar</a></li>
                                <li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                            data-bs-toggle="collapse" data-bs-target="#mov-collapse" aria-expanded="true">
                            Estoque
                        </button>
                        <div class="collapse show" id="mov-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="/emfalta" class="link-dark d-inline-flex text-decoration-none rounded">Em
                                        falta</a></li>
                                <li><a href="/estoque"
                                        class="link-dark d-inline-flex text-decoration-none rounded">Listar</a></li>
                            </ul>
                        </div>
                    <li class="mb-1">
                        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                            data-bs-toggle="collapse" data-bs-target="#movimentos-collapse" aria-expanded="false">
                            Movimentos
                        </button>
                        <div class="collapse" id="movimentos-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="/estoque/entrada"
                                        class="link-dark d-inline-flex text-decoration-none rounded">Entrada</a></li>
                                <li><a href="/estoque/saida"
                                        class="link-dark d-inline-flex text-decoration-none rounded">Saída</a></li>
                                <li><a href="#"
                                        class="link-dark d-inline-flex text-decoration-none rounded">Devolução</a></li>
                                <li><a href="/movimentos"
                                        class="link-dark d-inline-flex text-decoration-none rounded">Listar</a></li>
                                <li>
                            </ul>
                        </div>
                    </li>
                    @auth
                        @if (Auth::user()->id_setor == 1)
                            <li class="border-top my-3"></li>
                            <li class="mb-1 danger">
                                <button
                                    class="text-danger btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                    data-bs-toggle="collapse" data-bs-target="#admin-collapse" aria-expanded="false">
                                    Admin
                                </button>
                                <div class="collapse" id="admin-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <li><a href="/setor"
                                                class="link-dark d-inline-flex text-decoration-none rounded">Setores</a>
                                        </li>
                                        <li><a href="/users"
                                                class="link-dark d-inline-flex text-decoration-none rounded">Usuários</a>
                                        </li>
                                        <li><a href="/categoria"
                                                class="link-dark d-inline-flex text-decoration-none rounded">Categorias</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endif
                    @endauth

                    </li>
                    <li class="border-top my-3"></li>
                    <li class="mb-1">
                        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                            data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                            Account
                        </button>
                        <div class="collapse" id="account-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="/user/profile"
                                        class="link-dark d-inline-flex text-decoration-none rounded">Profile</a></li>
                                <form method="POST" action="/logout">
                                    @csrf
                                    <li>
                                        <a href="/logout" class="link-dark d-inline-flex text-decoration-none rounded"
                                            onclick="event.preventDefault();
                                    this.closest('form').submit();">Sign
                                            Out</a>
                                    </li>
                                    @guest
                                        <li><a href="/login"
                                                class="text-success link-dark d-inline-flex text-decoration-none rounded">Sign in</a>
                                        </li>
                                    @endguest
                                </form>
                            </ul>
                        </div>
                    </li>
                </ul><hr>
                <div class="usuario">
                    {{Auth::user()->name}} - {{getNomeSetor(Auth::user()->id_setor)}}
                </div>
            </div>
            <div class="flex-shrink-0 p-3 bg-white">
                @yield('content')
            </div>
        </main>

        <script src="{{ url('/') }}/assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/js/sidebars.js"></script>
        {{-- /nav --}}

        {{--  --}}
    </div>
    <div id="assinatura">
        <p>Desenvolvido por Carlos LP Souza</p>
    </div>
</body>

</html>
