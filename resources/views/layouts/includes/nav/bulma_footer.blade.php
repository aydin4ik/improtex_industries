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

        if(!$originalItem->children->isEmpty()){
            $children = $originalItem->children;
        }
        @endphp

        <div class="column">
            <ul>
                <li class="is-size-5">{{ $item->title }}</li>

                @foreach ($children as $child)
                    @php
                        $originaChild = $child;
                        if (Voyager::translatable($child)) {
                            $child = $child->translate($options->locale);
                        }
                    @endphp
                <li><a href="" target="{{ $child->target }}">{{ $child->title }}</a></li>       
                @endforeach

            </ul>
        </div>
        @if (!$loop->last)
            <div class="column"></div>
        @endif
                
    @endforeach
