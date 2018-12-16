@extends('layouts.pages2')

@push('title')<title>Confirm delete of {{$record->game->gameName}}</title>@endpush
@push('styles')
    {{-- Page specific CSS includes should be defined here; this .css file does not exist yet, but we can create it --}}
    {{--<link href='{{ asset('css/page.css') }}' rel='stylesheet'>--}}
    {{--<link href='{{ asset('css/form.css') }}' rel='stylesheet'>--}}
    <link href='{{ asset('css/newStyle.css') }}' rel='stylesheet'>
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
          crossorigin="anonymous">


@endpush

@push('body')

    <div class='center'>
        <div class='center-item'>
            <iframe src="https://giphy.com/embed/3oEjHLzm4BCF8zfPy0"
                    width="480"
                    height="251"
                    {{--frameBorder="0"--}}
                    class="giphy-embed"
                    allowFullScreen></iframe>
        </div>

        <div class='center-item'>
            <a href="https://giphy.com/gifs/airplane-i-am-serious-surely-you-cant-be-3oEjHLzm4BCF8zfPy0">via GIPHY</a>
        </div>
        <div class='center-item'>Are you positive you want to delete</div>
        <div class='center-item'>{{$record->game->gameName}} played on {{$record->date}}</div>
        <div class='center-item confirmDelete'>
            <a href='/game/delete/{{$record->record_id}}'>Shirley, delete it!</a>
        </div>
        <div class='center-item cancel'>
            <a href='/games/{{$record->record_id}}'>No thanks.</a>
        </div>
    </div>


@endpush