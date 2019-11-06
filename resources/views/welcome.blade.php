@extends('layouts.app')


@section('content')
    @{{ title }}    
    {{Route::currentRouteName()}}
    {{Route::currentRouteAction()}}
@endsection


@section('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                title: '12345'
            }
        })
    </script>
@endsection