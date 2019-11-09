<nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                    <a class="navbar-item" href="https://bulma.io">
                      <img src="{{ asset('img/logo.jpeg')}}">
                    </a>
                
                    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                      <span aria-hidden="true"></span>
                      <span aria-hidden="true"></span>
                      <span aria-hidden="true"></span>
                    </a>
                  </div>
                
                  <div class="navbar-menu">
                    <div class="navbar-start">
                      {!! menu('main', 'bulma_menu') !!}
                    </div>
                
                    <div class="navbar-end"> 
                      <nav-search-widget></nav-search-widget>
                      @foreach (config('localized-routes.supported-locales') as $locale)
                          {{-- Have to pass category if isset --}}
                      <a class="navbar-item" href="{{route(Route::currentRouteName(), ['category' => $category ?? ''], true, $locale)}}">{{strtoupper($locale)}}</a>
                      @endforeach
                      
                    </div>
                  </div>

      </nav>