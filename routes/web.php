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
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::get('user', 'UserController@index')->name('user');
    Route::get('user/create', 'UserController@create')->name('user.create');
    Route::post('user', 'UserController@store')->name('user.store');
    Route::get('user/{user}', 'UserController@edit')->name('user.edit');
    Route::put('user/{user}', 'UserController@update')->name('user.update');
    Route::delete('user/{user}', 'UserController@destroy')->name('user.delete');
    
    Route::get('depot', 'DepotController@index')->name('depot');
    Route::get('depot/create', 'DepotController@create')->name('depot.create');
    Route::post('depot', 'DepotController@store')->name('depot.store');
    Route::get('depot/{depot}', 'DepotController@edit')->name('depot.edit');
    Route::put('depot/{depot}', 'DepotController@update')->name('depot.update');
    Route::delete('depot/{depot}', 'DepotController@destroy')->name('depot.delete');
    
    Route::get('karyawan', 'KaryawanController@index')->name('karyawan');
    Route::get('karyawan/create', 'KaryawanController@create')->name('karyawan.create');
    Route::post('karyawan', 'KaryawanController@store')->name('karyawan.store');
    Route::get('karyawan/{karyawan}', 'KaryawanController@edit')->name('karyawan.edit');
    Route::put('karyawan/{karyawan}', 'KaryawanController@update')->name('karyawan.update');
    Route::delete('karyawan/{karyawan}', 'KaryawanController@destroy')->name('karyawan.delete');
});

Auth::routes(['verify' => true]);
 
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
