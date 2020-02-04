<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @routes
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        @yield('metatags')
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,500,600,700,800,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @yield('css')
    </head>
    @php
        $menu = menu('main', '_json');
        $menuItems = [];

        if (Voyager::translatable($menu)) {
        $menu = $menu->load('translations');
    }
    @endphp

    @foreach ($menu as $item)
        @php
            $originalItem = $item;

            if (Voyager::translatable($item)) {
                $item = $item->translate(app()->getLocale());
            }

            $originalItem->title = $item->title;

        @endphp

        @if(! $originalItem->children->isEmpty())
            @foreach ($originalItem->children as $child)
                @php
                    $originalChild = $child;

                    if (Voyager::translatable($child)) {
                        $child = $child->translate(app()->getLocale());
                    }

                    $originalChild->title = $child->title;
                @endphp
            @endforeach
        @else
            
        @endif
        @php
            $menuItems[] = $originalItem;
        @endphp
    @endforeach

    @php
        $locales = config('localized-routes.supported-locales');
        $localeItems = [];
    @endphp
    @foreach ($locales as $locale)
        @php
            $route = route(Route::current()->getName(), Route::current()->parameters(), true, $locale);

            $localeItems[] = [
                'name' => $locale,
                'route' => $route,
            ];
        @endphp
    @endforeach
    <body class="has-background-white-bis has-navbar-fixed-top" style="overflow: hidden">
            <div id="navigation">
                <main-menu 
                    :items="{{ json_encode($menuItems) }}"
                    :current-locale="{{ json_encode(app()->getLocale()) }}"
                    :locales="{{ json_encode($localeItems) }}"
                    :current-url={{ json_encode(url()->current()) }}
                    :logo="{{ json_encode(asset('img/logo.png')) }}"
                    ></main-menu>
            </div>

            <div id="app">
                @yield('content')
            </div>

            @include('layouts/includes/nav/footer')


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