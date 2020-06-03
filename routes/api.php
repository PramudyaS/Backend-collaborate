<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login','LoginController@login');

Route::group(['middleware'=>'auth:sanctum'],function(){
	Route::get('project/{creator_id}','ProjectController@index');
	Route::resource('project','ProjectController');

	Route::get('task/{project_id}','TaskController@index');
	Route::resource('task','TaskController');

	Route::get('todo/{task_id}','TodoController@index');
	Route::resource('todo','TodoController');
});
