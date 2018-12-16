@extends('layouts.pages2')

@push('title')<title>Create Game Record</title>@endpush
@push('styles')

    <link href='{{ asset('css/newStyle.css') }}' rel='stylesheet'>

@endpush

@push('body')
    <div class='wrapper'>
        <div id="page-content" class="page-content flexbox-col">
            <form id='edit' method='POST' action='/games'>
                @csrf
                <div class='list-item'>
                    <div>
                        <select id='game_id' name='game_id'>
                            <option value=''>Game...</option>
                            @foreach($games as $game)
                                <option value='{{$game->game_id}}' {{(old('game_id') == $game->game_id) ? 'selected' : '' }}>{{$game->gameName}}</option>
                            @endforeach
                        </select>
                        @include('modules.field-error', ['field' => 'game_id'])
                    </div>

                    <div >
                        <input id='date' type="date" class='form-control' name="date" value="{{ old('date') }}">
                        @include('modules.field-error', ['field' => 'date'])
                    </div>
                </div>

                <div class='edit-list-container'>
                    <div class='edit-list'>
                        <div class="edit-list-header">Players</div>
                        @for($i=1;$i<=4;$i++)
                            <div class="edit-list-item">
                                <select name='p{{$i}}_Name' class='form-control'>
                                    <option value='' disable selected>Player {{$i}}</option>
                                    @foreach($players as $player)
                                        <option value='{{$player->player_id}}' {{(old('p'.$i.'_Name') == $player->player_id) ? 'selected' : '' }}>{{$player->userName}}</option>
                                    @endforeach
                                </select>
                                @if ($i == 1)  @include('modules.field-error', ['field' => 'p1_Name']) @endif
                            </div>
                        @endfor
                    </div>
                </div>

                <div class='edit-list-container'>
                    <div class='edit-list'>
                        <div class="edit-list-header">Score</div>

                        @for($i=1;$i<=4;$i++)
                            <div class="edit-list-item">

                                <input type="number"
                                       name="p{{$i}}_Score"
                                       value='{{ old('p'.$i.'_Score') }}'/>
                                @include('modules.field-error', ['field' => 'p'.$i.'_Score'])
                            </div>
                        @endfor
                    </div>
                </div>

                <div class='edit-list-container'>
                    <div class='edit-list'>
                        <div class="edit-list-header">Winner</div>

                        @for($i=1;$i<=4;$i++)
                            <div class="edit-list-item">

                                <input class="edit-form-check-input"
                                       type="checkbox"
                                       name="p{{$i}}_Winner"
                                       value=1 {{ (old('p'.$i.'_Winner') == 1) ? 'checked':'' }}/>
                            </div>
                        @endfor
                    </div>
                </div>

                <div class='edit-buttons'>
                    <div>
                        <input class='edit-button' type='submit' value='Create'/>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endpush
