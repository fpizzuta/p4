@extends('layouts.pages2')

@push('title')<title>{{$record->game->gameName}}</title>@endpush
@push('styles')
    {{-- Page specific CSS includes should be defined here; this .css file does not exist yet, but we can create it --}}
    {{--<link href='{{ asset('css/page.css') }}' rel='stylesheet'>--}}
    {{--<link href='{{ asset('css/form.css') }}' rel='stylesheet'>--}}
    <link href='{{ asset('css/newStyle.css') }}' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


@endpush

@push('body')
<div class='wrapper'>
    <div id="page-content" class="page-content flexbox-col">
        <div class='list-item'> <span id='gameName'>{{$record->game->gameName}}</span><span id='gameDate'>{{$record->date}}</span></div>
        <div class='list-container'>
            <div class='list'>
                <div class="list-header">Player</div>

                @foreach($match as $player)
                    <div class="list-item">{{$player->playerName->userName}}</div>
                @endforeach
            </div>
        </div>
        <div class='list-container'>
            <div class='list'>
                <div class="list-header">Score</div>

                @foreach($match as $score)
                    <div class="list-item">{{$score->score}}</div>
                @endforeach
            </div>
        </div>
        <div class='list-container'>
            <div class='list'>
                <div class="list-header">Winner </div>

                @foreach($match as $winner)
                    <div class="check-item">@if ($winner->winner == 1) <i class="fas fa-check-circle"></i> @else &nbsp; @endif</div>
                @endforeach
            </div>
        </div>
        <div class='list-container'>
            <div class='list'>
                <div class="check-item">
                    <a href='/game/edit/{{$record->record_id}}'>Edit</a>
                </div>
            </div>
        </div>
        <div class='list-container'>
            <div class='list'>
                <div class="check-item">
                    <a href='/game/confirm/{{$record->record_id}}'>Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endpush