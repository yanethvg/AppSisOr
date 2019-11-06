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
    return redirect('login');
});

Auth::routes(["register"=>false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'usuarios','middleware'=>['auth','has.role:admin']], function () {
    //this is about how to add new users on the app
    Route::get('/','UserController@index')->name('usuarios.index');
    Route::get('/list','UserController@list')->name('usuarios.list');
    Route::put('/update/{id}','UserController@update')->name('usuarios.update');
    Route::get('/{id}','UserController@show')->name('usuarios.show');
    Route::put('/toggle/{id}','UserController@toggle')->name('usuarios.toggle');
    Route::post('/','UserController@store')->name('usuarios.store');

});

Route::group(['prefix' => 'bitacora'], function () {
    Route::get('/','BitacoraController@index');
    Route::post('/','BitacoraController@generatePDF');

});
