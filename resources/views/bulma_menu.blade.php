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
            if(url($item->link()) == url()->current()){
                $listItemClass = 'navbar-item is-tab is-active';
            }else{
                $listItemClass = 'navbar-item is-tab';
            }
        @endphp
        <a class="{{$listItemClass}}" href="{{ url($item->link()) }}" target="{{ $item->target }}">{{ $item->title }}</a>
    @else
        @php
            if(url($item->link()) == url()->current()){
                $listItemClass = 'navbar-item has-dropdown is-hoverable is-mega is-tab is-active';
            }else{
                $listItemClass = 'navbar-item has-dropdown is-hoverable is-mega is-tab';
            }
        @endphp
            <div class="{{$listItemClass}}">
            <a class="navbar-link is-arrowless" href="{{ url($item->link()) }}" target="{{ $item->target }}">{{ $item->title }}</a>
            <div class="navbar-dropdown">
                <div class="container">
                    <div class="navbar-menu">
                        <div class="navbar-start">
        @php
         $items = $originalItem->children;
        @endphp
        
        @foreach ($items as $item)
        @php
            if (Voyager::translatable($item)) {
                $item = $item->translate($options->locale);
            }

            if(url($item->link()) == url()->current()){
                $listItemClass = 'navbar-item is-tab is-active';
            }else{
                $listItemClass = 'navbar-item is-tab';
            }
        @endphp
            <a class="navbar-item is-tab" href="{{ url($item->link()) }}" target="{{ $item->target }}">{{ $item->title }}</a>
        @endforeach

        </div>
        </div>
        </div>
        </div>
        </div>
    @endif
    
@endforeach