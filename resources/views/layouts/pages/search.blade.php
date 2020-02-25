@extends('layouts.app')

@section('content')
<div id="search">
  <div class="setion m-t-100 is-hidden-mobile">
    <div class="container">
        <h3 class="subtitle is-size-3">{{ __('general.results') }} <strong>{{ $results }}</strong></h3>
          <tab-component>
            <tab name="{{ __('general.news') }} ({{$posts->count()}})" :selected="posts.length">
              @foreach ($posts as $post)
                <a class="box is-paddingless is-clipped" href="{{ route('news.show', [$post->category, $post->slug]) }}">
                  <div class="columns">
                    <div class="column is-2">
                      <figure class="image is-5by4">
                        <img src="{{ Voyager::image( $post->image ) }}">
                      </figure>
                    </div>
                    <div class="column">
                      <article class="p-t-15 p-b-15 p-r-15">
                        <p class="title is-size-6">{{ Str::limit($post->title, 200) }}</p>
                        <p class="subtitle is-size-6 m-t-5">{{ Str::limit($post->excerpt, 200) }}</p>
                      </article>
                    </div>
                  </div>
                </a>
              @endforeach
            </tab>
            <tab name="{{ __('general.projects') }} ({{$projects->count()}})" :selected="!posts.length && projects.length > 0">
              @foreach ($projects as $project)
                <a class="box is-paddingless is-clipped" href="{{ route('projects.show', $project->slug) }}">
                  <div class="columns">
                    <div class="column is-2">
                      <figure class="image is-5by4">
                        <img src="{{ Voyager::image( $project->image ) }}">
                      </figure>
                    </div>
                    <div class="column">
                      <article class="p-t-15 p-b-15">
                        <p class="title is-size-6">{{ Str::limit($project->title, 200) }}</p>
                        <p class="subtitle is-size-6">{{ Str::limit($project->scope, 200) }}</p>
                        <p class="subtitle is-size-6">{{ Str::limit($project->excerpt, 200) }}</p>
                      </article>
                    </div>
                  </div>
                </a>
              @endforeach
            </tab>
          </tab-component>

          <div class="notification is-danger has-text-centered" v-if="!posts.length && !projects.length">
            <p>
              {{ __('general.noResults') }} <strong>{{ $results }}</strong>
            </p>
          </div>
      </div>
  </div>

  <div class="section is-hidden-desktop">
    <h3 class="subtitle is-size-7">{{ __('general.results') }} <strong>{{ $results }}</strong></h3>
  </div>

  <div class="is-hidden-desktop">
    <tab-component>
      <tab name="{{ __('general.news') }} ({{$posts->count()}})" :selected="posts.length">
        @foreach ($posts as $post)
          <a class="box is-radiusless is-paddingless" href="{{ route('news.show', [$post->category, $post->slug]) }}">
            <figure class="image is-5by4">
              <img src="{{ Voyager::image( $post->image ) }}">
            </figure>
            <article class="p-t-20 p-b-20 p-l-20 p-r-20">
              <p class="title is-size-7">{{ Str::limit($post->title, 100) }}</p>
              <p class="subtitle is-size-7">{{ Str::limit($post->excerpt, 200) }}</p>
            </article>
          </a>
        @endforeach
      </tab>
      <tab name="{{ __('general.projects') }} ({{$projects->count()}})" :selected="!posts.length && projects.length > 0">
        @foreach ($projects as $project)
          <a class="box is-radiusless is-paddingless" href="{{ route('projects.show', $project->slug) }}">
            <figure class="image is-5by4">
              <img src="{{ Voyager::image( $project->image ) }}">
            </figure>
            <article class="p-t-20 p-b-20 p-l-20 p-r-20">
              <p class="title is-size-7">{{ Str::limit($project->title, 100) }}</p>
              <p class="subtitle is-size-7">{{ Str::limit($project->scope, 100) }}</p>
              <p class="subtitle is-size-7">{{ Str::limit($project->excerpt, 200) }}</p>
            </article>
          </a>
        @endforeach
      </tab>
    </tab-component>

    <div class="notification is-danger has-text-centered is-radiusless is-size-7" v-if="!posts.length && !projects.length">
      <p>
        {{ __('general.noResults') }} <br> " <strong>{{ $results }} </strong> "
      </p>
    </div>
  </div>
</div>
    
@endsection

@section('scripts')
    <script>
      var search = new Vue({
        el: '#search',
        data: {
          projects: {!! $projects !!},
          posts: {!! $posts !!},
        }
      })
    </script>
@endsection