<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=olá, initial-scale=1.0">
    <title>Dossier</title>
</head>
<body style="background-color: pink;">
    <div> isso aqui é a div</div>
    <h1>@yield('txtPrincipal')</h1>
    <div>
        @yield('conteudo')
    </div>
    <footer>
        @yield('footer')
    </footer>
</body>