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
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="has-background-white-ter has-navbar-fixed-top" style="overflow: hidden">
            <div id="navigation">
                @include('layouts/includes/nav/main')
            </div>

            <div id="app">
                @yield('content')
            </div>

            @include('layouts/includes/nav/footer')


        {{-- Scripts --}}
        <script src="{{ asset('js/app.js')}}"></script>
        @yield('scripts')

        <script>
            var nav = new Vue({
                el: '#navigation',
                data: {
                    menu: [],
                    locales: {!! json_encode(config('localized-routes.supported-locales')) !!},
                    currentLocale: {!! json_encode(app()->getLocale()) !!},
                    currentUrl: {!! json_encode(url()->current()) !!},
                    mobileMenuIsOpen: false,

                },
                mounted () {
                    axios
                        .get('/menu')
                        .then(response => (this.menu = response.data , this.init()))
                },
                methods: {
                    init () {
                        this.menu.forEach(item => {  
                            item.open = false;
                            item.title = item.title[this.currentLocale];
                            item.url = item.url[this.currentLocale];
                            if(this.currentUrl === item.url){
                                item.class= 'is-active';
                            }
                            if( Array.isArray(item.children) && item.children.length ) {
                                item.hasChildren = true;
                                if(this.currentUrl === item.url){
                                    item.open= true;
                                }
                                item.children.forEach(child => {
                                    child.title = child.title[this.currentLocale];
                                    child.url = child.url[this.currentLocale];
                                    if(this.currentUrl === child.url){
                                        child.class= 'is-current';
                                        item.class= 'is-active';
                                        item.open = true;
                                    }
                                })
                            }else{
                                item.hasChildren = false;
                            }
                        });                        
                        return this.menu;
                    },
                    onBurgerClick () {
                        this.mobileMenuIsOpen = !this.mobileMenuIsOpen;
                    },

                    onMobileDropdownClick (index) {
                        this.menu = this.menu.map((item, i) => {
                            if(index === i){
                                item.open = !item.open;
                            }else{
                                item.open = false;
                            }
                            if(item.open){
                                item.class = 'is-active';
                            }else{
                                item.class = '';
                            }
                            return item;
                        });
                    }
                }
            });
        </script>
    </body>
</html>