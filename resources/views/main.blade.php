<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Airport Manager</title>

        <!-- Fonts -->
        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- script --}}
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>

    @include('_partials.nav')


    <body class="">
      @yield('content')


        <div class="container bg-danger">
            <h1 class="">Elo</h1>

        </div>

    </body>

    <footer>
        
    </footer>
</html>
