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

Route::group(['prefix'=>'todo'],function(){
  Route::get('main','TodoController@index')->name('todo.index');
  Route::post('store','TodoController@store')->name('todo.store');
  Route::post('update/{id}','TodoController@update')->name('todo.update');
  Route::post('destroy/{id}','TodoController@destroy')->name('todo.destroy');
});