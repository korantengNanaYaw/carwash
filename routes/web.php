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
    return view('front');
});


Route::get('carwash',['uses' => 'CarwashController@index']);
Route::post('carwash/',['uses' => 'CarwashController@create']);
Route::get('carwash/getByname/{name}',['uses' => 'CarwashController@getCarWashByName']);
Route::get('carwash/reservations',['uses' => 'ReservationController@getReservationsByName']);
Route::delete('carwash/reservations/delete/{id}',['uses' => 'ReservationController@removeReservation']);
Route::get('carwash/getall',['uses' => 'CarwashController@getcarwash']);
Route::get('carwash/map',['uses' => 'CarwashController@bootmap']);
Route::post('reservation/',['uses' => 'ReservationController@create']);
Route::get('carwash/login',['uses' => 'CarwashController@login']);
Route::get('carwash/register',['uses' => 'CarwashController@register']);
//Route::post('carwash/',['uses' => 'CarwashController@store']);

Auth::routes();

Route::get('/home', 'HomeController@index');
