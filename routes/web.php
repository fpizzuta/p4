<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'GameController@index');
Route::get('/games', 'GameController@index');
Route::post('/games', 'GameController@store');
Route::post('/update/{record_id}', 'GameController@update');
Route::get('/games/{title}', 'GameController@show');
Route::get('/game/edit/{id}','GameController@edit');
//working here
Route::get('/game/confirm/{id}','GameController@confirm');
Route::get('/game/delete/{id}','GameController@delete');
Route::get('/add/game','GameController@addGame');
Route::post('/create/game','GameController@createGame');

Route::get('/newgame', 'GameController@create');
Route::get('/newgame2', 'GameController@create2');
Route::get('/user/{name}', 'UserController@show');
Route::get('/users', 'UserController@index');

Route::get('/practice','UserController@practice');
Route::get('/add/user','UserController@addUser');
Route::post('/create/user','UserController@createUser');

Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});



