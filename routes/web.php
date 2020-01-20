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

use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/DonateBlood',function(){
    return view('whyGiveBlood');
})->name('donateBlood');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::name('users.')->group(function () {
    Route::get('users/{id}','UserController@show')->name('show');
    Route::get('users/{id}/edit','UserController@edit')->name('edit');
    Route::put('users/{id}/update','UserController@update' )->name('update');
});
