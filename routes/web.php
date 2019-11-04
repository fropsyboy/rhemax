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


Route::get('/', 'PagesController@welcome')->name('welcome');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('/user', 'HomeController@user')->name('user');

//Route::get('/messages', 'HomeController@messages')->name('messages');

Route::get('/transaction', 'HomeController@transactions')->name('transaction');

Route::post('/upload', 'HomeController@csvUpload')->name('csvUpload');

Route::post('/send_message', 'HomeController@sendMessage')->name('send_message');

Route::get('/messages/{value?}', 'HomeController@messages')->name('messages');

Route::post('/update', 'HomeController@user_update')->name('update');

Route::post('/add_trans', 'HomeController@add_trans')->name('add_trans');

Route::group(['middleware' => ['role:admin']], function() {

    Route::get('/adminUsers',  'AdminController@adminUsers')->name('adminUsers');

    Route::get('/user_trans/{id}', 'AdminController@user_trans')->name('user_trans');

    Route::post('/add_credit', 'AdminController@add_credit')->name('add_credit');

});
