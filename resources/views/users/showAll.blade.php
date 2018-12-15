@extends('layouts.pages2')

@push('title')<title>All users</title>@endpush
@push('styles')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href='{{ asset('css/newStyle.css') }}' rel='stylesheet'>
@endpush

@push('body')
<div class='wrapper'>
    <div id="page-content" class="page-content flexbox-col">
        <div class='list-container'>
            <div class='list'>
                <div class="list-header">All Users</div>
                @foreach($players as $player)
                    <div class="check-item">{{ $player->userName }}</div>
                @endforeach
            </div>
            <div class='list'>
                <div class="list-header">Total Games</div>
                @foreach($players as $player)
                    <div class="check-item">{{ $player->count }}</div>
                @endforeach
            </div>
        </div>
        <a href='/add/user' id="btn-plus">
            <i class="fas fa-plus-circle"> Create User</i>
        </a>
    </div>
</div>
@endpush

