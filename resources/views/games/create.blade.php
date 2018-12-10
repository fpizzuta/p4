@extends('layouts.pages2')

@push('styles')
    {{-- Page specific CSS includes should be defined here; this .css file does not exist yet, but we can create it --}}
    {{--<link href='{{ asset('css/page.css') }}' rel='stylesheet'>--}}
    <link href='{{ asset('css/newStyle.css') }}' rel='stylesheet'>
@endpush

@push('body')
<div class='wrapper'>
    <div id="page-content" class="page-content flexbox-col">
        <form method='POST' action='/games'>
            @csrf
            <div class="form-group">
                <label class='labels' for='game_id'>Game Name *</label>
                <select name='game_id' class='form-control'>
                    <option value=''>Choose one...</option>
                     @foreach($games as $game)
                        <option value='{{$game->game_id}}' {{(old('game_id') == $game->game_id) ? 'selected' : '' }}>{{$game->gameName}}</option>
                     @endforeach
                 </select>
                {{--<input type="text" class='form-control' name="gameName" placeholder="Game" value="{{ old('gameName') }}">--}}
                @include('modules.field-error', ['field' => 'game_id'])
            </div>
            <div class="form-group">
                <label class='labels' for='date'>Date *</label>
                <input type="date" class='form-control' name="date" value="{{ old('date') }}">
                @include('modules.field-error', ['field' => 'date'])
            </div>
            <div>
                <fieldset class='Fieldset'>
                    <legend class='legend'>Player 1 *</legend>
                    <div class="form-group">
                        {{--<input type="text" class='form-control' name="p1_Name" placeholder='Player 1 Name *' value="{{ old('p1_Name') }}"/>--}}
                        <select name='p1_Name' class='form-control'>
                            <option value=''>Choose one...</option>
                            @foreach($players as $player)
                                <option value='{{$player->player_id}}' {{(old('p1_Name') == $player->player_id) ? 'selected' : '' }}>{{$player->userName}}</option>
                                {{--<option value='{{$player->player_id}}'>{{$player->userName}}</option>--}}
                            @endforeach
                        </select>
                        @include('modules.field-error', ['field' => 'p1_Name'])
                    </div>
                    <div class="form-group">
                        <input type="number" class='form-control' name="p1_Score" placeholder='Score' value="{{ old('p1_Score') }}"/>
                        @include('modules.field-error', ['field' => 'p1_Score'])
                    </div>
                    <div class="form-group">
                        <label class="form-check-label" for='p1_Winner'>
                            <input class="form-check-input" type="checkbox"  name="p1_Winner" value=1 {{ (old('p1_Winner') == 1) ? 'checked':'' }}/>
                            Winner
                        </label>

                    </div>
                </fieldset>
            </div>
            <div class="form-group">
                <fieldset class='Fieldset'>
                    <legend class='legend'>Player 2</legend>
                    <div class="form-group">
                        {{--<input type="text" class='form-control' name="p2_Name" placeholder='Player 2 Name' value="{{ old('p2_Name') }}"/>--}}
                        <select name='p2_Name' class='form-control'>
                            <option value='0'>Choose one...</option>
                            @foreach($players as $player)
                                <option value='{{$player->player_id}}' {{(old('p2_Name') == $player->player_id) ? 'selected' : '' }}>{{$player->userName}}</option>
                                {{--<option value='{{$player->player_id}}'>{{$player->userName}}</option>--}}
                            @endforeach
                        </select>
                        @include('modules.field-error', ['field' => 'p2_Name'])
                    </div>
                    <div class="form-group">
                        <input type="number" class='form-control' name="p2_Score" placeholder='Score' value="{{ old('p2_Score') }}"/>
                        @include('modules.field-error', ['field' => 'p2_Score'])
                    </div>
                    <div class="form-group">
                        <label class="form-check-label" for='p2_Winner'>
                            <input class="form-check-input" type="checkbox"  name="p2_Winner" value=1 {{ (old('p2_Winner') == 1) ? 'checked':'' }}/>
                            Winner
                        </label>

                    </div>
                </fieldset>
            </div>
            <div class="form-group">
                <fieldset class='Fieldset'>
                    <legend class='legend'>Player 3</legend>
                    <div class="form-group">
                        {{--<input type="text" class='form-control' name="p3_Name" placeholder='Player 3 Name' value="{{ old('p3_Name') }}"/>--}}
                        <select name='p3_Name' class='form-control'>
                            <option value='0'>Choose one...</option>
                            @foreach($players as $player)
                                <option value='{{$player->player_id}}' {{(old('p3_Name') == $player->player_id) ? 'selected' : '' }}>{{$player->userName}}</option>
                                {{--<option value='{{$player->player_id}}'>{{$player->userName}}</option>--}}
                            @endforeach
                        </select>
                        @include('modules.field-error', ['field' => 'p3_Name'])
                    </div>
                    <div class="form-group">
                        <input type="number" class='form-control' name='p3_Score' placeholder='Score' value="{{ old('p3_Score') }}"/>
                        @include('modules.field-error', ['field' => 'p3_Score'])
                    </div>
                    <div class="form-group">
                        <label class="form-check-label" for='p3_Winner'>
                            <input class="form-check-input" type="checkbox"  name="p3_Winner" value=1 {{ (old('p3_Winner') == 1) ? 'checked':'' }}/>
                            Winner
                        </label>

                    </div>
                </fieldset>
            </div>
            <div class="form-group">
                <fieldset class='Fieldset'>
                    <legend class='legend'>Player 4</legend>
                    <div class="form-group">
                        {{--<input type="text" class='form-control' name="p4_Name" placeholder='Player 4 Name' value="{{ old('p4_Name') }}"/>--}}
                        <select name='p4_Name' class='form-control'>
                            <option value='0'>Choose one...</option>
                            @foreach($players as $player)
                                <option value='{{$player->player_id}}' {{(old('p4_Name') == $player->player_id) ? 'selected' : '' }}>{{$player->userName}}</option>
{{--                                <option value='{{$player->player_id}}'>{{$player->userName}}</option>--}}
                            @endforeach
                        </select>
                        @include('modules.field-error', ['field' => 'p4_Name'])
                    </div>
                    <div class="form-group">
                        <input type="number" class='form-control' name="p4_Score" placeholder='Score' value="{{ old('p4_Score') }}"/>
                        @include('modules.field-error', ['field' => 'p4_Score'])
                    </div>
                    <div class="form-group">
                        <label class="form-check-label" for='p4_Winner'>
                            <input class="form-check-input" type="checkbox"  name="p4_Winner" value=1 {{ (old('p4_Winner') == 1) ? 'checked':'' }}/>
                            Winner
                        </label>

                    </div>
                </fieldset>
            </div>
            <div id='button'>
                <input id="btn" type="submit" value="Create"/>
            </div>
        </form>
    </div>
</div>
@endpush
