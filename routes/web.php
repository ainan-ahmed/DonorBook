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

use App\Detail;
use App\Http\Controllers\UserController;
use App\User;

Route::get('/', function () {
    $array = array();
    $divarray = array();
    $bg = array('A+','A-','B+','B-','AB+','AB-','O+','O-');
    $division = array('Dhaka','Chittagong','Khulna','Rajshahi','Barisal','Sylhet');
   // dd($bg->length());
    for($i = 0 ; $i<count($bg) ; $i++)
    {
        $ap = Detail::where('blood_group','=',$bg[$i])->count();
        $array[$i] = $ap;
    }
    for($i = 0 ; $i<count($division) ; $i++)
    {
        $ap = Detail::where('division','=',$division[$i])->count();
        $divarray[$i] = $ap;
    }
    $user = User::all();
    
    return view('welcome')->withbg($array)->withdivision($divarray)->withuser($user);
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/DonateBlood',function(){
    return view('whyGiveBlood');
})->name('donateBlood');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::get('/search','searchController@getSearch')->name('search');
Route::get('/search/list','searchController@searchDonor')->name('donorList');
Route::name('users.')->group(function () {
    Route::get('users/{id}','UserController@show')->name('show');
    Route::get('users/{id}/edit','UserController@edit')->name('edit');
    Route::put('users/{id}/update','UserController@update' )->name('update');
});
