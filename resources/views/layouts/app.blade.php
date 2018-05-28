<!DOCTYPE html>
<html long="ja">
    <head>
        <meta charset="UTF-8">
        <!--レスポンシブ対応-->
        <meta http-equiv-"X-UA-comoatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initinal-scale-1">
        
        <title>@yield('title')-Monolist</title>
        
        <!--Bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
    </head>
    <body>
        @include('commons.navbar')
        
        @yield('cover')
        
        <div class="container">
            @include('commons.error_messages')
            
            @yield('content')
        </div>
        
        @include('commons.footer')
    </body>
</html>