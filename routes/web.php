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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('user', 'PersonController@index');

Route::post('/agregar' , 'PersonController@store')->name('store');

Route::get('/editar/{id}' , 'PersonController@edit')->name('editar');

Route::put('/update/{id}' , 'PersonController@update')->name('update');

Route::delete('/eliminar/{id}' , 'PersonController@destroy')->name('eliminar');



Route::get('recurso', 'RecursoController@index')->name('home');

Route::post('/agregarProducto' , 'RecursoController@store')->name('store');

Route::get('/editarProduc/{id}' , 'RecursoController@edit')->name('editar');

Route::put('/updateProduc/{id}' , 'RecursoController@update')->name('update');

Route::delete('/eliminarProduc/{id}' , 'RecursoController@destroy')->name('eliminar');


