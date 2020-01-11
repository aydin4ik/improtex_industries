<nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
      <a class="navbar-item" href="https://bulma.io">
        <img src="{{ asset('img/logo.png')}}">
      </a>

      <a role="button" ref="burgerButton" class="navbar-burger burger" :class="mobileMenuIsOpen ? 'is-active' : false" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample" @click.prevent="onBurgerClick">
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
          @if($locale != app()->getLocale())
            <a class="navbar-item" href="{{route(Route::current()->getName(), Route::current()->parameters(), true, $locale)}}">{{strtoupper($locale)}}</a>
          @endif
        @endforeach
      </div>
    </div>

  <transition name="slide-fade">                  
    <div class="navbar-menu-mobile" v-if="mobileMenuIsOpen">
        <div class="box is-radiusless is-paddingless">
          <div class="wrapper">
            <div class="search p-t-10 p-b-10 p-l-10 p-r-10">
              <input class="input is-medium" type="text" placeholder="Search">
            </div>

            <aside class="mobile-menu">
              <div v-for="(item, i) in menu" :key="i">
                <div class="menu-item"  v-if="!item.hasChildren">
                  <a :href="item.url" class="menu-link" :class="item.class">@{{ item.title }}</a>
                </div>
                <div class="menu-item has-dropdown" :class="item.class" v-else>
                  <header class="dropdown-header">
                    <a class="dropdown-toggle p-r-15"  @click.prevent="onMobileDropdownClick(i)">
                      <i class="fas fa-angle-right"></i>
                    </a>
                    <a  class="menu-link" :class="item.class" :href="item.url">@{{ item.title }}</a>
                  </header>
                  <transition name="slide-up-fade">
                    <ul class="dropdown" v-if="item.open">
                      <li v-for="subItem in item.children">
                        <a :class="subItem.class" :href="subItem.url">@{{subItem.title}}</a>
                      </li>
                    </ul>
                  </transition>
                </div>
              </div>
              <div class="tabs is-fullwidth p-t-5 p-b-5 has-text-weight-bold">
                <ul>
                  @foreach (config('localized-routes.supported-locales') as $locale)
                  <li>
                    <a class="has-text-grey-light" href="{{route(Route::current()->getName(), Route::current()->parameters(), true, $locale)}}"> 
                    <span>{{ strtoupper($locale) }}</span>
                    </a>
                  </li>
                  @endforeach
                </ul>
              </div>
                

              
            </aside>
          </div>
        </div>
    </div>
  </transition>

</nav>