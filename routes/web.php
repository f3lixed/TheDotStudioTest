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
Route::get('/', function(){
  return view('welcome');
});
// Route::view('login', 'users.index', ["authenticateUser"=>false]);
Route::get('login', 'UserController@index', ["authenticateUser"=>false]);
Route::post('login','UserController@login')->name('login');
Route::get('dashboard','UserController@show')->name('dashboard')->middleware('auth');
Route::get('/dashboard/create-cap','CapacitacionController@index')->name('dashboard-createcap')->middleware('auth');
Route::post('/dashboard/new-cap','CapacitacionController@create')->middleware('auth');
Route::get('/dashboard/insc-cap','CapacitacionUsuarioController@index')->name('dashboard-createcapusu')->middleware('auth');
Route::post('/dashboard/inscnew-cap','CapacitacionUsuarioController@create')->middleware('auth');
Route::post('/dashboard/cancelar-cap','CapacitacionUsuarioController@cancelar');
Route::get('logout','UserController@logout');
