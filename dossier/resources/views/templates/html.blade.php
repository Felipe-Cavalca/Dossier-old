<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- importação de css -->
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.css')}}" media="screen" />
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" media="screen" />
    <style type="text/css">
        .load {
            width: 100px;
            height: 100px;
            position: absolute;
            top: 30%;
            left: 45%;
            color: red;
        }
    </style>
    @yield('cssTemplate')
    @yield('css')
    <title>Dossier</title>
</head>

<body>

    <div class="load">
        <h1>Carregando...</h1>
    </div>

    <div class="conteudoHtml" style="display: none">
        @yield('body')
    </div>

    <!-- importação de js -->
    <script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('jquery/jquery-3.6.0.min.js')}}"></script>
    <script type="text/javascript" src="http://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://kit.fontawesome.com/b60cd43ad5.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('jQuery-Mask-Plugin-master/src/jquery.mask.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/mascaras.js')}}"></script>
    <script type="text/javascript">
        window.addEventListener("beforeunload", function (event) {
            $('.conteudoHtml').hide();
            $('.load').show();
        });

        setTimeout(function() {
            $('.conteudoHtml').show();
            $('.load').hide();
        }, 500);
    </script>
    @yield('jsTemplate')
    @yield('js')
</body>

</html>