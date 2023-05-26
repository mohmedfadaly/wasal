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
Route::get('add-kid','KidsController@add')->name('add_kid')->middleware('customer');
Route::post('get-cities','KidsController@Getcities')->name('get_cities')->middleware('customer');
Route::get('edit-kid/{id}','KidsController@edit')->name('edit_kid')->middleware('customer');
Route::post('store-kid','KidsController@storekids')->name('store_kids')->middleware('customer');
Route::post('update-kid','KidsController@updatekids')->name('update_kids')->middleware('customer');
