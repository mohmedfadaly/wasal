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
Route::get('patients','KidsController@getKids')->name('get-patients')->middleware('customer');
Route::get('patient/{id}','KidsController@showKid')->name('show-patient')->middleware('customer');
Route::delete('patient/{id}','KidsController@deleteKid')->name('delete-patient')->middleware('customer');
Route::get('patient-evalute/{id}','KidsController@evaluteKid')->name('evalute-patient')->middleware('customer');
// Route::put('patient/{id}','KidsController@editKid')->name('edit-patient')->middleware('customer');
Route::get('patient/{id}/edit','KidsController@editKid')->name('edit_patient')->middleware('customer');
Route::get('patient/{id}/data','KidsController@showKidData')->name('show_patient_data')->middleware('customer');
Route::get('appels/{id}','KidsController@appels')->name('add-appels')->middleware('customer');
Route::post('store-app-kid/{id}','KidsController@addappels')->name('addappels')->middleware('customer');
Route::post('store-app-kid','KidsController@Deletesession')->name('Deletesession')->middleware('customer');



