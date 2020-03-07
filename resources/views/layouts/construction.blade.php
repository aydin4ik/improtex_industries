<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @routes
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{setting('site.title')}}</title>

        @yield('metatags')
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,500,600,700,800,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @yield('css')
    </head>
    
    <body class="has-background-white-bis" style="overflow: hidden">

        <div id="app">
            <div class="has-bg-brand is-relative">
                <div class="is-covered-left">
                    <div class="hero is-fullheight">
                        <div class="hero-body">
                            <div class="container">
                                <div class="is-relative" style="z-index: 21">
                                    
                                    <div class="columns is-mobile is-centered">
                                        <div class="column is-10 has-text-centered">
                                            <img src="{{ asset('images/construction.svg') }}" alt="">
                                            <h1 class="title has-text-white is-size-1 has-text-centered is-hidden-mobile has-text-weight-light">Sorry, our website is under construction</h1>
                                            <h1 class="title has-text-white is-size-4 has-text-centered is-hidden-desktop is-hidden-tablet">Sorry, our website is under construction</h1>
                                            <img src="{{ asset('img/logo.png')}}" alt="" style="width: 130px;">
                                        </div>
                                    </div>
            
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>

        {{-- Scripts --}}
        <script src="{{ mix('js/app.js')}}"></script>
        @yield('scripts')

        <script>
            var nav = new Vue({
                el: '#navigation'
            });
        </script>
    </body>
</html>