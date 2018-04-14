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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', 'InicioController@index');

Route::resource('/users', 'UsersController');

Route::get('/areaadmin', function () {
    return view('areaAdmin.principal');
})->middleware('auth');

Route::get('/mensagemAcesso', function(){
  return view('areaAdmin.mensagemAcesso');
});

Route::get('/locacaos/marcacoes', 'LocacaosController@marcacoes')->middleware('auth');;

Route::resource('/recursos', 'RecursosController');

Route::resource('/locacaos', 'LocacaosController');

Route::get('/locacaos/pesquisa/data', 'LocacaosController@showData');

Route::post('/locacaos/storeData', 'LocacaosController@storeData');

Route::get('users/edita/tipo','UsersController@alteraTipo');

Route::get('users/edita/acesso','UsersController@liberaAcesso');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
