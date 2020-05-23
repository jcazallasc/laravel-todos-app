<?php

use Illuminate\Support\Facades\Route;

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


Route::get('todos', 'TodosController@index')->name('todos');
Route::get('todos/{todoId}', 'TodosController@show')->name('todo-show');

Route::get('new-todos', 'TodosController@create');
Route::post('store-todos', 'TodosController@store');

Route::get('todos/{todoId}/edit', 'TodosController@edit');
Route::post('todos/{todoId}/update-todos', 'TodosController@update');

Route::delete('todos/{todoId}/delete', 'TodosController@destroy');

Route::post('todos/{todoId}/complete', 'TodosController@markAsCompleted');
