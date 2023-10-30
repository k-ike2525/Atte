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

Route::get('/', function () {
    return view('/home');
});

Auth::routes();

Route::get('/stamp', 'HomeController@index')->name('stamp');
Route::get('/attendance', 'AttendanceController@index')->name('attendance.index');

Route::group(['middleware' => 'guest'], function() {
    Route::get('/register', 'Auth\RegisteredUserController@create')->name('register');
    Route::post('/register', 'Auth\RegisteredUserController@store')->name('register');
 });

Route::group(['middleware' => 'auth'], function() {
    Route::post('/start_time', 'WorkingsController@punchIn')->name('start_time');
    Route::post('/end_time', 'WorkingsController@punchOut')->name('end_time');
});

Route::group(['middleware' => 'auth'], function() {
    Route::post('/breakings_start_time', 'BreakingsController@breakIn')->name('breakings_start_time');
    Route::post('/breakings_end_time', 'BreakingsController@breakOut')->name('breakings_end_time');
});




//Route::group(['middleware' => 'auth'], function() {
//    Route::post('/punchin', 'TimestampsController@In')->name('timestamp/punchin');
//    Route::post('/punchout', 'TimestampsController@Out')->name('timestamp/punchout');
//});


