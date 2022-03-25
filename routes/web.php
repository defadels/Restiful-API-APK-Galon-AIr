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

Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');

    Route::get('user', 'UserController@index')->name('admin.user');
    Route::get('user/create', 'UserController@create')->name('admin.create');
    Route::post('user/create', 'UserController@store')->name('admin.store');
    Route::get('user/{user}', 'UserController@edit')->name('admin.edit');
    Route::put('user/{user}', 'UserController@update')->name('admin.update');
    Route::delete('user', 'UserController@destroy')->name('admin.destroy');

    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
