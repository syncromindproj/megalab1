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
    return view('welcome');
});


Route::resource('tipotest', 'TipoTestController');
Route::resource('categoria', 'CategoriaController');

Route::group(['middleware' => ['auth']], function() {
	Route::resource('analisis', 'AnalisisController');
	Route::resource('upload', 'UploadController');
});


//Route::get('upload', 'UploadController@upload');
Route::post('ImportarAnalisis', 'UploadController@ImportarAnalisis');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('listadoanalisis', 'AnalisisController@listaranalisis')->name('listadoanalisis');
Route::get('listadotipotest', 'TipoTestController@listartipotests')->name('listadotipotest');
Route::get('getlista/{id}', 'AnalisisController@getanalisis')->name('getlista');

