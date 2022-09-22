<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Airport Manager</title>

        <!-- Fonts -->

        <!-- Styles -->
        <script src='https://api.mapbox.com/mapbox-gl-js/v2.10.0/mapbox-gl.js'></script>
        <link href='https://api.mapbox.com/mapbox-gl-js/v2.10.0/mapbox-gl.css' rel='stylesheet' />
        <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- script --}}
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>



    <body class="d-flex flex-column h-100" style="background-color: #DCDCDC;">
        @include('_partials.nav')

        <div class="m-3"></div>

        @yield('content')

        @include('_partials.footer')
    </body>

</html>
