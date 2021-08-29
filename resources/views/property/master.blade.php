<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LaraDev: CRUD Imobi - @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<nav class="nav navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a href="#" class="navbar-brand">Lara<b>Dev</b></a>
        <ul class="navbar navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('imoveis.index') }}">Listar todos os imóveis</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('imoveis.create') }}">Cadastrar um novo imóvel</a></li>
        </ul>
    </div>
</nav>


<div class="container my-3">
    <h1>@yield('header')</h1>
    @yield('content')
</div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>
