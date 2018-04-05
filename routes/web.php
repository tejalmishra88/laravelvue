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
Route::resource('/tasks', 'Todo1Controller');
//Route::resource('/tasks2', 'Todo2Controller');
//Route::resource('/tasks3', 'Todo3Controller');
//Route::resource('/tasks4', 'Todo4Controller');
//Route::resource('/tasks45', 'Todo4Controller@store');
//Route::resource('/tasks2', 'Todo2Controller');
Route::get('tasks/search/{term?}','Todo1Controller@index');
