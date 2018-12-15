@extends('layouts.pages2')

@push('title')<title>Edit {{$record->game->gameName}}</title>@endpush
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
    <div class='wrapper'>
        <div id="page-content" class="page-content flexbox-col">
            <form id='edit' method='POST' action='/update/{{$record->record_id}}'>
                @csrf
                <div class='list-item'>
                    {{--<span>--}}
                        <div>
                            <select name='game_id'>
                                <option value=''>Choose one...</option>
                                @foreach($games as $game)
                                    <option value='{{$game->game_id}}' {{($record->game_id == $game->game_id) ? 'selected' : '' }}>{{$game->gameName}}</option>
                                @endforeach
                            </select>
                            @include('modules.field-error', ['field' => 'game_id'])
                        </div>
                    {{--</span>--}}
                    {{--<span>--}}
                        <div>
                             <input id='date' type="date" name="date" value="{{$record->date}}">
                            @include('modules.field-error', ['field' => 'date'])
                        </div>
                    {{--</span>--}}
                </div>


                <div class='edit-list-container'>
                    <div class='edit-list'>
                        <div class="edit-list-header">Player</div>

                        @foreach($match as $player)
                            <div class="edit-list-item">
                                <select name='p{{$player->position}}_Name' class='form-control'>
                                    <option value=''>Choose one...</option>
                                    @foreach($players as $item)
                                        <option value='{{$item->player_id}}' {{($player->player_id == $item->player_id) ? 'selected' : '' }}>{{$item->userName}}</option>

                                    @endforeach
                                </select>
                                @include('modules.field-error', ['field' => 'p'.$player->position.'_Name'])
                            </div>
                        @endforeach
                        {{-- If someone edits a record with less than 4 players you need to add the missing rows so they can add additional players--}}
                        @if (count($match) < 3)
                            @for($i=count($match)+1;$i<=4;$i++)
                                <div class="edit-list-item">
                                    <select name='p{{$i}}_Name' class='form-control'>
                                        <option value=''>Choose one...</option>
                                        @foreach($players as $item)
                                            <option value='{{$item->player_id}}' }}>{{$item->userName}}</option>
                                        @endforeach
                                    </select>
                                    @include('modules.field-error', ['field' => 'p'.$i.'_Name'])
                                </div>
                            @endfor
                        @endif
                    </div>
                </div>

                    <div class='edit-list-container'>
                        <div class='edit-list'>
                            <div class="edit-list-header">Score</div>

                            @foreach($match as $score)
                                <div class="edit-list-item">

                                    <input type="number"
                                           name="p{{$score->position}}_Score"
                                           value='{{$score->score}}'/>
                                    @include('modules.field-error', ['field' => 'p'.$score->position.'_Score'])
                                </div>
                            @endforeach
                            @if (count($match) < 3)
                                @for($i=count($match)+1;$i<=4;$i++)
                                    <div class="edit-list-item">
                                        <input type="number"
                                               name="p{{$i}}_Score"
                                        />
                                        @include('modules.field-error', ['field' => 'p'.$i.'_Score'])
                                    </div>
                                @endfor
                            @endif
                        </div>
                    </div>
                    <div class='edit-list-container'>
                        <div class='edit-list'>
                            <div class="edit-list-header">Winner</div>

                            @foreach($match as $winner)
                                <div class="edit-list-item">

                                    <input class="edit-form-check-input"
                                           type="checkbox"
                                           name="p{{$winner->position}}_Winner"
                                           value=1 {{($winner->winner == 1) ? 'checked' : ''}}/>
                                </div>
                            @endforeach
                            @if (count($match) < 3)
                                @for($i=count($match)+1;$i<=4;$i++)
                                    <div class="edit-list-item">
                                        <input class="edit-form-check-input"
                                               type="checkbox"
                                               name="p{{$i}}_Winner"
                                               value=1}}/>
                                    </div>
                                @endfor
                            @endif
                        </div>
                    </div>
                    <div class='edit-buttons'>
                        <div>
                            <input class='edit-button' type='submit' value='Save'/>
                        </div>
                    </div>

            </form>
        </div>
    </div>
@endpush