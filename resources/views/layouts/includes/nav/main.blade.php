<nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                    <a class="navbar-item" href="https://bulma.io">
                      <img src="{{ asset('img/logo.png')}}">
                    </a>
                
                    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                      <span aria-hidden="true"></span>
                      <span aria-hidden="true"></span>
                      <span aria-hidden="true"></span>
                    </a>
                  </div>
                
                  <div class="navbar-menu">
                    <div class="navbar-start">
                      {!! menu('main', 'layouts.includes.nav.bulma_main') !!}
                    </div>
                
                    <div class="navbar-end"> 
                      <nav-search-widget></nav-search-widget>
                      @foreach (config('localized-routes.supported-locales') as $locale)
                          {{-- Have to pass category if isset --}}
                        @if($locale != app()->getLocale())
                          <a class="navbar-item" href="{{route(Route::currentRouteName(), ['category' => $category ?? ''], true, $locale)}}">{{strtoupper($locale)}}</a>
                        @endif
                      @endforeach
                    </div>
                  </div>

      </nav>