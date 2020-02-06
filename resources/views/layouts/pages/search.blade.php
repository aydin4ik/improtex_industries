@extends('layouts.app')

@section('content')
    <div class="setion m-t-100">
        <div class="container">
            <h3 class="title is-size-3">Search results for:</h3>
            <h3 class="subtitle is-size-3">{{ $results }}</h3>
            <div class="tabs is-medium">
                <ul>
                  <li class="is-active"><a>News (3)</a></li>
                  <li><a>Projects (0)</a></li>

                </ul>
              </div>
            <div class="box">
                <article class="media">
                    <figure class="media-left">
                      <p class="image is-64x64">
                        <img src="https://bulma.io/images/placeholders/128x128.png">
                      </p>
                    </figure>
                    <div class="media-content">
                      <div class="content">
                        <p>
                          <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
                          <br>
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias natus eius id voluptate alias? Magnam animi officia sed quo doloremque nostrum voluptatem, excepturi repellendus est quam non placeat iure quis!
                        </p>
                      </div>
                    </div>
                  </article>
            </div>
            <div class="box">
                <article class="media">
                    <figure class="media-left">
                      <p class="image is-64x64">
                        <img src="https://bulma.io/images/placeholders/128x128.png">
                      </p>
                    </figure>
                    <div class="media-content">
                      <div class="content">
                        <p>
                          <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
                          <br>
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
                        </p>
                      </div>
                    </div>
                  </article>
            </div>
            <div class="box">
                <article class="media">
                    <figure class="media-left">
                      <p class="image is-64x64">
                        <img src="https://bulma.io/images/placeholders/128x128.png">
                      </p>
                    </figure>
                    <div class="media-content">
                      <div class="content">
                        <p>
                          <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
                          <br>
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
                        </p>
                      </div>
                    </div>
                  </article>
            </div>
        </div>
    </div>
@endsection