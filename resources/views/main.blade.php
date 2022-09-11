<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
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

    
    
    <body class="d-flex flex-column h-100">
        @include('_partials.nav')

        @yield('content')

        {{-- <iframe
            width="900"
            height="700"
            frameborder="0" style="border:0"
            referrerpolicy="no-referrer-when-downgrade"
            src="https://www.google.com/maps/embed/v1/view?key={{ env('') }}&center=-33.8569,151.2152&zoom=18&maptype=satellite"
            allowfullscreen>
        </iframe> --}}
        @include('_partials.footer')
    </body>

</html>
