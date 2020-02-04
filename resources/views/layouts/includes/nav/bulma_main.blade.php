{{-- @todo copy hrefs to links if url is used as route --}}
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

        if( app()->getLocale() . '.' .$item->route == Route::currentRouteName() ){
            $item->class = 'navbar-item has-dropdown is-hoverable is-mega is-tab is-active';
        }else{
            $item->class = 'navbar-item has-dropdown is-hoverable is-mega is-tab';
        }



        
    @endphp
    @if($originalItem->children->isEmpty())
        
        @php
            if( app()->getLocale() . '.' .$item->route == Route::currentRouteName() ){
                $listItemClass = 'navbar-item is-tab is-active';
            }else{
                $listItemClass = 'navbar-item is-tab';
            }
        @endphp
        @if (Route::has(app()->getLocale() . '.' .$item->route))
            <a class="{{$listItemClass}}" href="{{ route($item->route, json_decode($item->parameters, true) , true, null) }}" target="{{ $item->target }}">{{ $item->title }}</a>
        @else
            <a class="{{$listItemClass}}"  target="{{ $item->target }}">{{ $item->title }}</a>
        @endif
    @else
            
            <div class="{{$originalItem->class}}">
            @if (Route::has(app()->getLocale() . '.' .$item->route))
                <a class="navbar-link is-arrowless" href="{{ route($item->route, json_decode($item->parameters, true) , true, null) }}" target="{{ $item->target }}">{{ $item->title }}</a>
            @else
                <a class="navbar-link is-arrowless"  target="{{ $item->target }}">{{ $item->title }}</a>
            @endif
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

            if( app()->getLocale() . '.' .$child->route == Route::currentRouteName() ){
                $parentItemClass = 'navbar-item has-dropdown is-hoverable is-mega is-tab is-active';
                $childItemClass = 'navbar-item is-tab is-subactive';
            }else{
                $childItemClass = 'navbar-item is-tab';
                $parentItemClass = 'navbar-item has-dropdown is-hoverable is-mega is-tab';
            }
        @endphp
        @if (Route::has(app()->getLocale() . '.' .$child->route))
            <a class="{{$childItemClass}}" href="{{ route($child->route, json_decode($child->parameters, true) , true, null) }}" target="{{ $child->target }}">{{ $child->title }}</a>
            {{ $originalItem->class }}
        @else
            <a class="{{$childItemClass}}" target="{{ $child->target }}">{{ $child->title }}</a>
        @endif
        @endforeach
        
        </div>
        </div>
        </div>
        </div>
        </div>
    @endif
    
@endforeach