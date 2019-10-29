<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="container is-fluid">
            <div class="navbar-brand">
                    <a class="navbar-item" href="https://bulma.io">
                      <img src="{{ Voyager::image(setting('site.logo')) }}">
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
                      {{-- <a class="navbar-item is-tab">Home</a>
                      <a class="navbar-item is-tab">About</a>
                      <div class="navbar-item has-dropdown is-hoverable is-mega is-tab">
                          <a class="navbar-link is-arrowless">
                            News
                          </a>
                  
                          <div class="navbar-dropdown">
                            <div class="container">
                              <div class="navbar-menu">
                                <div class="navbar-start">
                                  <a class="navbar-item is-tab">News</a>
                                  <a class="navbar-item is-tab">Press releases</a>
                                  <a class="navbar-item is-tab">Project Update</a>
                                  <a class="navbar-item is-tab">Meetings</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                
                      <div class="navbar-item has-dropdown is-hoverable is-mega is-tab">
                        <a class="navbar-link is-arrowless">
                          Scope of business
                        </a>
                
                        <div class="navbar-dropdown">
                          <div class="container">
                            <div class="navbar-menu">
                              <div class="navbar-start">
                                <a class="navbar-item is-tab">Workshop services</a>
                                <a class="navbar-item is-tab">Project design</a>
                                <a class="navbar-item is-tab">Metal construction</a>
                                <a class="navbar-item is-tab">Agricultural machinery</a>
                                <a class="navbar-item is-tab">Truck super structures</a>
                                <a class="navbar-item is-tab">on/ofshore projects</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <a class="navbar-item is-tab">Products</a>
                      <a class="navbar-item is-tab">Projects</a>
                      <a class="navbar-item is-tab">Contacts</a> --}}
                    </div>
                
                    <div class="navbar-end"> 
                      <a class="navbar-item"><i class="fas fa-search fa-lg"></i></a>
                      <a class="navbar-item">az</a>
                      <a class="navbar-item">en</a>
                      <a class="navbar-item">ru</a>
                    </div>
                  </div>

        </div>
      </nav>