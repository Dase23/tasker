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


Route::get('/login', function () {
    return view('index');
});
Route::post('/login', 'UsersController@Login');

Route::middleware(['auth'])->group(function () {
    Route::get('/desk/{id}', 'DeskController@GetDesk');
   
    Route::post('/tasks/{id}', 'TaskController@Done');
    Route::post('/tasks', 'TaskController@addTask');
    Route::delete('/tasks/{id}', 'TaskController@DelTask');
    Route::post('/desks', 'DeskController@newDesk');
    Route::get('/', 'DeskController@index');
    Route::get('/desk/{id}/done', 'TaskController@doneTasks');
    Route::get('/desk/{id}/active', 'TaskController@activeTasks');
});



