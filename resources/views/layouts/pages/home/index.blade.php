@extends('layouts.app')

@section('title')
    {{ __('general.homepage') }} / Improtex Industries
@endsection

@section('content')

    <div class="section has-bg-striped m-t-100 p-t-100 p-b-100 is-relative is-hidden-mobile">
        <div class="container">
          
          <div class="notification has-background-transparent is-radiusless has-left-border-wide is-absolute is-paddingless top-140">
            <h1 class="title is-uppercase is-size-1 is-size-4-mobile has-text-weight-bold p-t-10 p-b-10 p-l-15">{{ __('general.news') }}</h1>
          </div>
          
          <div class="tile is-ancestor is-centered">
            @isset($bigPost)
            <div class="tile is-parent">
                @php
                  if (Voyager::translatable($bigPost)) {
                    $originalBigPost = $bigPost;
                    $bigPost = $bigPost->translate(app()->getLocale());
                    $category = $bigPost->category->getTranslatedAttribute('name', app()->getLocale());
                  }
                @endphp
                <a class="tile is-child box is-paddingless has-tag is-clipped is-relative" href="{{ route('news.show', [$bigPost->category, $bigPost->slug]) }}">
                    <span class="tag-big has-text-weight-medium">{{ $category }}</span>
                      @if ($originalBigPost->image)
                        <figure class="image is-3by2 is-covered-left">
                          <img class="is-rounded-small" src={{ Voyager::image( $originalBigPost->thumbnail('big') ) }}>
                        </figure>
                      @else
                        <figure class="image is-3by2">
                          <img class="is-rounded-small" src={{ asset('images/no-image.svg') }}>   
                        </figure>
                      @endif
                    <article class="notification is-white is-radiusless p-l-40">
                      <div class="content m-t-40 p-l-25 has-left-border-thin">
                          <h6 class="subtitle is-7 has-text-primary has-text-weight-bold">{{ $originalBigPost->created_at->translatedFormat('d M Y') }}</h6>
                          <h4 class="title is-size-6 m-t-20 has-text-weight-semi-bold">{{ Str::limit($bigPost->title, 120) }}</h4>
                          <h6 class="subtitle has-text-grey-light m-t-20 has-text-weight-normal">{{ Str::limit($bigPost->excerpt, 220) }}</h6>
                          <h5 class="link is-size-6">{{ __('general.more') }}</h5>
                      </div>
                    </article>
                  </a>
              </div>
              @endisset
              
              @isset($mediumPosts)
                    
                @if ( $mediumPosts->count() < 2)
                <div class="tile is-vertical is-6">
                @else
                <div class="tile is-vertical is-7">
                @endif
                  <div class="tile">
                  
                  @if ($mediumPosts->count() < 2)
                    <div class="tile is-parent is-vertical is-12">
                      @foreach ($mediumPosts as $post)
                        @php
                          if (Voyager::translatable($post)) {
                            $originalPost = $post;
                            $post = $post->translate(app()->getLocale());
                            $category = $post->category->getTranslatedAttribute('name', app()->getLocale());
                          }
                        @endphp
                            
                        <a class="tile is-child box is-paddingless has-tag is-clipped is-relative" href="{{ route('news.show', [$post->category, $post->slug]) }}">
                          <span class="tag-big has-text-weight-medium">{{ $category }}</span>
                          @if ($originalPost->image)
                        <figure class="image is-3by2 is-covered-left">
                          <img class="is-rounded-small" src={{ Voyager::image( $originalPost->thumbnail('big') ) }}>
                        </figure>
                      @else
                        <figure class="image is-3by2">
                          <img class="is-rounded-small" src={{ asset('images/no-image.svg') }}>   
                        </figure>
                      @endif
                          <article class="notification is-white is-radiusless p-l-40">
                            <div class="content m-t-40 p-l-25 has-left-border-thin">
                                <h6 class="subtitle is-7 has-text-primary has-text-weight-bold">{{ $originalPost->created_at->translatedFormat('d M Y') }}</h6>
                                <h4 class="title m-t-20">{{ Str::limit($post->title, 120) }}</h4>
                                <h6 class="subtitle has-text-grey-light m-t-20">{{ Str::limit($post->excerpt, 220) }}</h6>
                                <h5 class="link is-size-6">{{ __('general.more') }}</h5>
                            </div>
                          </article>
                        </a>
                      @endforeach
                    </div>
                  @else
                      
                  
                  <div class="tile is-parent is-vertical is-5">
                    @foreach ($mediumPosts as $post)
                      @php
                        if (Voyager::translatable($post)) {
                          $originalPost = $post;
                          $post = $post->translate(app()->getLocale());
                          $category = $post->category->getTranslatedAttribute('name', app()->getLocale());
                        }
                      @endphp
                      <a class="tile is-child box is-paddingless has-tag is-relative" href="{{ route('news.show', [$post->category, $post->slug]) }}">
                        <span class="tag-small has-text-weight-medium is-size-7">{{ $category }}</span>
                        @if ($originalPost->image)
                          <figure class="image is-3by2">
                            <img class="is-rounded-small" src={{ Voyager::image( $originalPost->thumbnail('medium') ) }}>
                          </figure>
                        @else
                          <figure class="image is-3by2">
                            <img class="is-rounded-small" src={{ asset('images/no-image.svg') }}>   
                          </figure>
                      @endif
                        <article class="notification is-white">
                          <h6 class="subtitle is-7 has-text-primary has-text-weight-bold">{{ $originalPost->created_at->translatedFormat('d M Y') }}</h6>
                          <h4 class="title is-6">{{ Str::limit($post->title, 80) }}</h4>
                          <h6 class="subtitle is-7 has-text-grey-light">{{ Str::limit($post->excerpt, 80) }}</h6>
                        </article>
                      </a>
                    @endforeach
                  </div>
                @endisset

                @isset($smallPosts)
                    

                  <div class="tile is-parent is-vertical">

                      @foreach ($smallPosts as $post)
                        @php
                          if (Voyager::translatable($post)) {
                            $originalPost = $post;
                            $post = $post->translate(app()->getLocale());
                            $category = $post->category->getTranslatedAttribute('name', app()->getLocale());
                          }
                        @endphp
                        @if ( $smallPosts->count() == 1) 
                          <a class="tile is-child box is-paddingless has-tag is-relative" href="{{ route('news.show', [$post->category, $post->slug]) }}">
                            <span class="tag-small has-text-weight-medium is-size-7">{{ $category }}</span>
                            @if ($originalPost->image)
                              <figure class="image is-1by1">
                                <img class="is-rounded-small" src={{ Voyager::image( $originalPost->thumbnail('square') ) }}>
                              </figure>
                            @else
                              <figure class="image is-3by2">
                                <img class="is-rounded-small" src={{ asset('images/no-image.svg') }}>   
                              </figure>
                            @endif
                            <article class="notification is-white">
                              <h6 class="subtitle is-7 has-text-primary has-text-weight-bold">{{ $originalPost->created_at->translatedFormat('d M Y') }}</h6>
                              <h4 class="title is-6">{{ Str::limit( $post->title, 120) }}</h4>
                              <h6 class="subtitle is-7 has-text-grey-light m-t-20">{{ Str::limit($post->excerpt, 200) }}</h6>
                            </article>
                          </a>
                        @endif
                        @if ($smallPosts->count() == 2)
                          <a class="tile is-child box is-paddingless has-tag is-relative" href="{{ route('news.show', [$post->category, $post->slug]) }}">
                            <span class="tag-small has-text-weight-medium is-size-7">{{ $category }}</span>
                            @if ($originalPost->image)
                              <figure class="image is-2by1">
                                <img class="is-rounded-small" src={{ Voyager::image( $originalPost->thumbnail('big') ) }}>
                              </figure>
                            @else
                              <figure class="image is-2by1">
                                <img class="is-rounded-small" src={{ asset('images/no-image.svg') }}>   
                              </figure>
                            @endif
                            <article class="notification is-white">
                              <h6 class="subtitle is-7 has-text-primary has-text-weight-bold">{{ $originalPost->created_at->translatedFormat('d M Y') }}</h6>
                              <h4 class="title is-6">{{ Str::limit($post->title, 80) }}</h4>
                              <h6 class="subtitle is-7 has-text-grey-light">{{ Str::limit($post->excerpt, 80) }}</h6>
                            </article>
                          </a>
                        @endif
                        @if ($smallPosts->count() > 2)
                          <a class="tile is-child box" href="{{ route('news.show', [$post->category, $post->slug]) }}">
                            <div class="columns">
                              <div class="column">
                                <h6 class="subtitle is-7 has-text-primary has-text-weight-bold">{{ $originalPost->created_at->translatedFormat('d M Y') }}</h6>
                                <h4 class="title is-6">{{ Str::limit($post->title, 80) }}</h4>
                                <h6 class="subtitle is-7 has-text-grey-light">{{ Str::limit($post->excerpt, 80) }}</h6>
                              </div>
                              <div class="column is-one-third">
                                @if ($originalPost->image)
                                  <figure class="image is-1by1">
                                    <img class="is-rounded-all" src={{ Voyager::image( $originalPost->thumbnail('small') ) }}>
                                  </figure>
                                @else
                                  <figure class="image is-1by1">
                                    <img class="is-rounded-all" src={{ asset('images/no-image.svg') }}>   
                                  </figure>
                                @endif
                              </div>
                            </div>
                          </a>
                        @endif
                        
                      @endforeach

                  </div>
                  @endif
                @endisset

                </div>
              </div>
              
            </div>

            <div class="level m-t-50">
              <div class="level-item">
                <a href="{{ route('news.index') }}" class="link is-next is-size-3 is-capitalized">{{ __('general.seeAllNews') }} <i class="custom-icon-long-arrow-right"></i></a>    
              </div>
            </div>
            
        </div>


      
    </div>

    {{-- Mobile posts start--}}
    
    <div class="has-bg-striped p-t-50 p-b-20 is-relative is-hidden-desktop">
      <div class="notification has-background-transparent is-radiusless has-left-border-wide is-paddingless">
        <h1 class="title is-uppercase is-size-3-mobile has-text-weight-bold p-t-10 p-b-10 p-l-15">{{ __('general.news') }}</h1>
      </div>

      @isset($bigPost)
          
        <a class="box is-paddingless is-radiusless has-tag is-relative" href="{{ route('news.show', [$bigPost->category, $bigPost->slug]) }}">
          <span class="tag-small has-text-weight-medium is-size-7">{{ $bigPost->category->name }}</span>
          @if ($originalBigPost->image)
            <figure class="image is-3by2">
              <img src={{ Voyager::image( $originalBigPost->thumbnail('big') ) }}>
            </figure>
          @else
            <figure class="image is-3by2">
              <img src={{ asset('images/no-image.svg') }}>   
            </figure>
          @endif
          <article class="notification is-white">
            <h6 class="subtitle is-7 has-text-primary has-text-weight-bold">{{ $originalBigPost->created_at->translatedFormat('d M Y') }}</h6>
            <h4 class="title is-6">{{ Str::limit($bigPost->title, 80) }}</h4>
            <h6 class="subtitle is-7 has-text-grey-light">{{ Str::limit($bigPost->excerpt, 80) }}</h6>
          </article>
        </a>

      @endisset

      @isset($mediumPosts)
          
        @foreach ($mediumPosts as $post)
          @php
            if (Voyager::translatable($post)) {
              $originalPost = $post;
              $post = $post->translate(app()->getLocale());
            }
          @endphp
          <a class="box is-paddingless is-radiusless has-tag is-relative" href="{{ route('news.show', [$post->category, $post->slug]) }}">
            <span class="tag-small has-text-weight-medium is-size-7">{{ $post->category->name }}</span>
            @if ($originalPost->image)
            <figure class="image is-3by2">
              <img src={{ Voyager::image( $originalPost->thumbnail('big') ) }}>
            </figure>
            @else
              <figure class="image is-3by2">
                <img src={{ asset('images/no-image.svg') }}>   
              </figure>
            @endif
            <article class="notification is-white">
              <h6 class="subtitle is-7 has-text-primary has-text-weight-bold">{{ $originalPost->created_at->translatedFormat('d M Y') }}</h6>
              <h4 class="title is-6">{{ Str::limit($post->title, 80) }}</h4>
              <h6 class="subtitle is-7 has-text-grey-light">{{ Str::limit($post->excerpt, 80) }}</h6>
            </article>
          </a>
        @endforeach

      @endisset
      <div class="level m-t-20 is-relative">
        <div class="level-item">
          <a href="{{ route('news.index') }}" class="link is-size-4 is-capitalized">{{ __('general.seeAllNews') }} <i class="custom-icon-long-arrow"></i></a>    
        </div>
      </div>

    </div>

    

  {{-- Mobile posts end--}}

  {{-- Desktop Projects start--}}

    <div class="section has-bg-brand p-t-100 p-b-200 is-relative is-hidden-mobile">
      <div class="container">

          <div class="notification has-background-transparent is-radiusless has-left-border-wide is-absolute is-paddingless top-140">
            <h1 class="title is-uppercase is-size-1 has-text-weight-bold p-t-10 p-b-10 p-l-15">{{ __('general.projects') }}</h1>
          </div>

      </div>

      <div class="container">

        @isset($project1)
            
        
          <a class="box is-paddingless is-radiusless is-marginless has-shadow-top has-date" href="{{ route('projects.show', $project1->slug) }}">
              <div class="date-left has-background-grey-darker is-hidden-touch">
                  <h5 class="title has-text-grey-light is-size-4 is-uppercase has-text-weight-bold">{{ $project1->created_at->translatedFormat('d M Y') }}</h5>
                </div>
              <div class="columns is-gapless">
                    @php
                    if (Voyager::translatable($project1)) {
                      $originalProject1 = $project1;
                      $project1 = $project1->translate(app()->getLocale());
                    }
                  @endphp
                  <div class="column">
                      
                      <article class="notification is-white is-radiusless">
                        <div class="content p-l-50 p-r-40 p-t-20">
                            <h4 class="title m-t-20 is-size-5 is-uppercase">{{ Str::limit($project1->title, 80) }}</h4>
                            <h6 class="subtitle has-text-grey-light m-t-20">{{ Str::limit($project1->scope, 80) }}</h6>
                            <h6 class="subtitle has-text-grey-light m-t-20">{{ Str::limit($project1->excerpt, 200) }}</h6>
                            <h5 class="link is-size-6">{{ __('general.more') }}</h5>
                        </div>
                      </article>
                  </div>
                  <div class="column">
                    @if ($originalProject1->image)
                      <figure class="image is-5by3">
                        <img src={{ Voyager::image( $originalProject1->thumbnail('big') ) }}>
                      </figure>
                    @else
                      <figure class="image is-5by3">
                        <img src={{ asset('images/no-image.svg') }}>   
                      </figure>
                    @endif
                  </div>
                </div>
            </a>

          @endisset

          @isset($project2)
            @php
              if (Voyager::translatable($project2)) {
                $originalProject2 = $project2;
                $project2 = $project2->translate(app()->getLocale());
              }
            @endphp
        
            <a class="box is-paddingless is-radiusless is-marginless  has-date" href="{{ route('projects.show', $project2->slug) }}">
                <div class="date-right has-background-grey-darker is-hidden-touch">
                    <h5 class="title has-text-grey-light is-size-4 is-uppercase has-text-weight-bold">{{ $originalProject2->created_at->translatedFormat('d M Y') }}</h5>
                  </div>
                <div class="columns is-gapless">
                    <div class="column">
                      @if ($originalProject2->image)
                        <figure class="image is-5by3">
                          <img src={{ Voyager::image( $originalProject2->thumbnail('big') ) }}>
                        </figure>
                      @else
                        <figure class="image is-5by3">
                          <img src={{ asset('images/no-image.svg') }}>   
                        </figure>
                      @endif
                      </div>
                    <div class="column">
                        <article class="notification is-white is-radiusless">
                          <div class="content p-l-50 p-r-40 p-t-20">
                              <h4 class="title m-t-20 is-uppercase">{{ Str::limit($project2->title, 80) }}</h4>
                              <h6 class="subtitle has-text-grey-light m-t-20">{{ Str::limit($project2->scope, 80) }}</h6>
                              <h6 class="subtitle has-text-grey-light m-t-20">{{ Str::limit($project2->excerpt, 200) }}</h6>
                              <h5 class="link is-size-6">{{ __('general.more') }}</h5>
                          </div>
                        </article>
                    </div>
                    
                  </div>
              </a>

            @endisset


      </div>

      <div class="container">
          <div class="level m-t-50">
              <div class="level-item">
                <a href="{{ route('projects.index')}}" class="link is-next is-size-3 is-capitalized">{{ __('general.seeAllProjects') }} <i class="custom-icon-long-arrow-right"></i></a>    
              </div>
            </div>
      </div>

      <div class="container">
        <div class="level m-t-100">
          <div class="level-item">
            <h6 class="title is-size-5 is-uppercase has-text-weight-normal m-b-25">{{ __('general.partners') }}</h6>
          </div>
        </div>

        <div class="columns is-multiline is-centered">
          @foreach ($partners as $partner)
              @if ($partner->category == 'partner')
                  <div class="column is-2 has-text-centered">
                      <a href=" {{ $partner->url }}" target="blank" class="link">
                          <img src="{{ Voyager::image( $partner->image ) }}" class="grayscale partner">
                      </a>
                  </div>
              @endif
          @endforeach
      </div>
      </div>
    </div>

    @include('layouts.includes.search')

    {{-- Mobile Projects start --}}

    <div class="has-bg-brand p-t-50 is-relative is-hidden-desktop">
      <div class="notification has-background-transparent is-radiusless has-left-border-wide is-paddingless">
        <h1 class="title is-uppercase is-size-3-mobile has-text-weight-bold p-t-10 p-b-10 p-l-15">{{ __('general.projects') }}</h1>
      </div>
      @isset($project1)
          
        @php
          if (Voyager::translatable($project1)) {
            $originalProject1 = $project1;
            $project1 = $project1->translate(app()->getLocale());
          }
        @endphp
        <a class="box is-paddingless is-radiusless has-tag is-relative" href="{{ route('projects.show', $project1->slug) }}">
          @if ($originalProject1->image)
            <figure class="image is-5by3">
              <img src={{ Voyager::image( $originalProject1->thumbnail('big') ) }}>
            </figure>
          @else
            <figure class="image is-5by3">
              <img src={{ asset('images/no-image.svg') }}>   
            </figure>
          @endif
          <article class="notification is-white">
            <h6 class="subtitle is-7 has-text-primary has-text-weight-bold">{{ $originalProject1->created_at->translatedFormat('d M Y') }}</h6>
            <h4 class="title is-6">{{ Str::limit($project1->title, 80) }}</h4>
            <h6 class="subtitle is-7 has-text-grey-light">{{ Str::limit($project1->scope, 80) }}</h6>
            <h6 class="subtitle is-7 has-text-grey-light">{{ Str::limit($project1->excerpt, 200) }}</h6>
          </article>
        </a>
        
      @endisset

      @isset($project2)
          
        @php
          if (Voyager::translatable($project2)) {
            $originalProject2 = $project2;
            $project2 = $project2->translate(app()->getLocale());
          }
        @endphp
        <a class="box is-paddingless is-radiusless has-tag is-relative" href="{{ route('projects.show', $project2->slug) }}">
          @if ($originalProject2->image)
            <figure class="image is-5by3">
              <img src={{ Voyager::image( $originalProject2->thumbnail('big') ) }}>
            </figure>
          @else
            <figure class="image is-5by3">
              <img src={{ asset('images/no-image.svg') }}>   
            </figure>
          @endif
          <article class="notification is-white">
            <h6 class="subtitle is-7 has-text-primary has-text-weight-bold">{{ $originalProject2->created_at->translatedFormat('d M Y') }}</h6>
            <h4 class="title is-6">{{ Str::limit($project2->title, 80) }}</h4>
            <h6 class="subtitle is-7 has-text-grey-light">{{ Str::limit($project2->scope, 80) }}</h6>
            <h6 class="subtitle is-7 has-text-grey-light">{{ Str::limit($project2->excerpt, 200) }}</h6>
          </article>
        </a>

      @endisset

      <div class="level m-t-20 is-relative">
        <div class="level-item">
          <a href="{{ route('projects.index')}}" class="link is-size-4 is-capitalized">{{ __('general.seeAllProjects') }} <i class="custom-icon-long-arrow"></i></a>    
        </div>
      </div>
    </div>



    {{-- Partner Mobile Start --}}
<div class="has-background-white-bis is-hidden-desktop m-t-50 m-b-50">
  <div class="container">
      <h6 class="title is-size-6-mobile is-uppercase has-text-weight-normal has-text-centered">factory's main partners</h6>
      <div class="columns is-multiline is-centered is-mobile">
          @foreach ($partners as $partner)
              @if ($partner->category == 'partner')
                  <div class="column is-5 has-text-centered">
                      <a href=" {{ $partner->url }}" target="blank" class="link">
                          <img src="{{ Voyager::image( $partner->image ) }}" class="partner is-mobile ">
                      </a>
                  </div>
              @endif
          @endforeach
      </div>
  </div>
</div>
{{-- Partner Mobile End --}}


@endsection

