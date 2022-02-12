<?php
    require_once('../../config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('site/css/layout.css')}}">
    <script src="{{asset('site/js/layout.js')}}"></script>
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('site/imagens')}}/favicon-96x96.png">
    <title>Eletronet - @yield('title')</title>
</head>
<body>
    {{-- <div class="container">
        oi
    </div> --}}
    <div class="container_principal container-fluid" id="Topo">
        @include('layouts.topo')
        <div class="content">
            @yield('content')
        </div>
        @include('layouts.rodape')
    </div>
</body>
</html>
