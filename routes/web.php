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
    return  redirect('login');
});

Route::get('projectprint', function () {
    return  view('print.project');
})->name("projectprint");

Route::get('recept', function () {
    return  view('print.recept');
})->name("recept");


Route::get('/dashboard', function () {
    return  redirect('admin');
})->middleware(['auth'])->name('dashboard');

Route::get('upload', 'ApplicationController@upload')->name('backup');
Route::post('sync', 'ApplicationController@syncdatabase')->name('sync');

require __DIR__.'/auth.php';
