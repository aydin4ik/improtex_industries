@extends('layouts.app')

@section('content')
    <div class="setion m-t-100">
        <div class="container">
            <div class="box">
                <h3 class="title is-size-3">Search results for:</h3>
                <h3 class="subtitle is-size-3">{{ $results }}</h3>
            </div>
        </div>
    </div>
@endsection