@extends('layouts.pages2')

@push('title')<title>Create Player</title>@endpush
@push('styles')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href='{{ asset('css/newStyle.css') }}' rel='stylesheet'>
@endpush

@push('body')
<div class='wrapper'>
    <div id="page-content" class="page-content flexbox-col">
    <form method='POST' action='/create/user'>
        @csrf
        <div class="form-group">
            <label class='labels' for='user'>User Name *</label>
            <input type="text" id='user' class='form-control' name="user" placeholder="User Name" value="{{ old('user') }}">
            @include('modules.field-error', ['field' => 'user'])
        </div>
        <div id='button'>
            <input id="btn" type="submit" value="Create"/>
        </div>
    </form>
    </div>
</div>
@endpush

