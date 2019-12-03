<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        @yield('metatags')
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,500,600,700,800,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="has-background-white-ter">
        <div id="app">
            @include('layouts/includes/nav/main')

            @yield('content')

            @include('layouts/includes/nav/footer')

        </div>

        {{-- Scripts --}}
        <script src="{{ asset('js/app.js')}}"></script>
        @yield('scripts')
    </body>
</html>