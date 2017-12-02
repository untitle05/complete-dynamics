<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Test de liste dynamique</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <link href={{asset("css/bootstrap.min.css")}} rel="stylesheet">

    @yield('css')
    <style>
        body { font-family: 'Lato'; }
    </style>
</head>

<body>
<br>
@yield('content')

<script src={{asset("js/jquery.min.js")}}></script>
@yield('scripts')
</body>
</html>