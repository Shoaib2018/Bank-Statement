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
    return redirect('/login');
});

Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('login');
Route::post('/login', 'App\Http\Controllers\LoginController@login');

Route::get('/statement', 'App\Http\Controllers\StatementController@index')->name('statement');
Route::get('/new', 'App\Http\Controllers\StatementController@new')->name('new');
Route::post('/new', 'App\Http\Controllers\StatementController@add');
