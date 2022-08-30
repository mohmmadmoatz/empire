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

Route::post('login', 'UserController@login')->name('login');

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('info', 'UserController@info')->name('info');
    Route::get('project', 'ProjectController@index')->name('project');

   });


   Route::get('getPostscategory/{id}', 'ApplicationController@getPostscategory')->name('getPostscategory');
Route::get('posts', 'ApplicationController@getPosts')->name('posts');
Route::get('getcat', 'ApplicationController@getcat')->name('getcat');
Route::post('sendbuildrequst', 'ApplicationController@store');

   Route::get('project/{id}', 'ProjectController@openProject')->name('openproject');
