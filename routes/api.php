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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('user', 'APIController@get_all_user');
Route::post('user/add_user', 'APIController@insert_data_user');
Route::put('user/update_user/{id}', 'APIController@update_data_user');

Route::get('depot', 'APIController@get_all_depot');

Route::get('editor', 'APIController@get_all_editor');

Route::get('orderan', 'APIController@get_all_order');
Route::post('orderan/add_orderan', 'APIController@insert_data_user');

Route::get('orderan/masuk', 'APIController@order_masuk');
Route::get('orderan/proses', 'APIController@order_proses');
Route::get('orderan/kirim', 'APIController@order_kirim');
Route::get('orderan/batal', 'APIController@order_batal');
Route::get('orderan/selesai', 'APIController@order_selesai');

Route::get('orderan/user/{dibuat_oleh_id}', 'APIController@get_user_order');
Route::get('orderan/proses_oleh/{diproses_oleh_id}', 'APIController@get_process_order');
