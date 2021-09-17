<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- importação de css -->
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.css')}}" media="screen"/>
    @yield('cssTemplate')
    @yield('css')
    <title>Dossier</title>
</head>
<body>
@yield('body')
<!-- importação de js -->
<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
@yield('jsTemplate')
@yield('js')
</body>
</html>