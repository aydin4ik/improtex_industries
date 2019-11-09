@php

    if (Voyager::translatable($items)) {
        $items = $items->load('translations');
    }

@endphp

@foreach ($items as $item)
    @php

        $originalItem = $item;
        if (Voyager::translatable($item)) {
            $item = $item->translate($options->locale);
        }

        
    @endphp
    @if($originalItem->children->isEmpty())
        
        @php
            if( strtolower(app()->getLocale() . '.' .$item->url) == Route::currentRouteName() ){
                $listItemClass = 'navbar-item is-tab is-active';
            }else{
                $listItemClass = 'navbar-item is-tab';
            }
        @endphp
        <a class="{{$listItemClass}}" href="{{ route(strtolower($item->link())) }}" target="{{ $item->target }}">{{ $item->title }}</a>
    @else
        @php
            if( strtolower(app()->getLocale() . '.' .$item->url) == Route::currentRouteName() ){
                $listItemClass = 'navbar-item has-dropdown is-hoverable is-mega is-tab is-active';
            }else{
                $listItemClass = 'navbar-item has-dropdown is-hoverable is-mega is-tab';
            }
        @endphp
            <div class="{{$listItemClass}}">
            <a class="navbar-link is-arrowless" href="{{ route(strtolower($item->link())) }}" target="{{ $item->target }}">{{ $item->title }}</a>
            <div class="navbar-dropdown">
                <div class="container">
                    <div class="navbar-menu">
                        <div class="navbar-start">
        @php
         $children = $originalItem->children;
        @endphp
        
        @foreach ($children as $child)
        @php
            if (Voyager::translatable($child)) {
                $child = $child->translate($options->locale);
            }

            if( url()->current() == url(app()->getLocale() . '/' . $item->url . '/' . $child->url) ){
                $listItemClass = 'navbar-item is-tab is-subactive';
            }else{
                $listItemClass = 'navbar-item is-tab';
            }
        @endphp
            <a class="{{$listItemClass}}" href="{{ route($item->url, ['category' => $child->url], true, null) }}" target="{{ $child->target }}">{{ $child->title }}</a>
        @endforeach

        </div>
        </div>
        </div>
        </div>
        </div>
    @endif
    
@endforeach