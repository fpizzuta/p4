@extends('layouts.pages2')

@push('styles')
    {{-- Page specific CSS includes should be defined here; this .css file does not exist yet, but we can create it --}}
    {{--<link href='{{ asset('css/page.css') }}' rel='stylesheet'>--}}
    {{--<link href='{{ asset('css/form.css') }}' rel='stylesheet'>--}}
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
          integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP"
          crossorigin="anonymous">
    <link href='{{ asset('css/newStyle.css') }}' rel='stylesheet'>

@endpush

@push('title')<title>All Games</title>@endpush

@push('body')
    <div class='wrapper'>
        <div id="page-content" class="page-content flexbox-col">
            <div class='list-container'>
                <div class='list'>
                    <div class="list-header">Title</div>
                    @foreach($data as $game)
                        <div class="list-item"><a target="_self"
                                                  href="games/{{$game->record_id}}">{{$game->game->gameName}}</a></div>
                    @endforeach
                </div>
            </div>
            <div class='list-container'>
                <div class='list'>
                    <div class="list-header">Date</div>
                    @foreach($data as $game)
                        <div class="list-item">{{$game->date}}</div>
                    @endforeach
                </div>
            </div>
            <a href='/newRecord' id="btn-plus">
                <i class="fas fa-plus-circle"> Create Record</i>
            </a>
        </div>
    </div>
@endpush
