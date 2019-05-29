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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::group(['prefix' => 'subtenant'], function (){
//    Route::resource('house', 'HouseController' );

});
Route::group(['prefix' => 'lessor', 'middleware' => ['role:lessor']], function (){
    Route::resource('house', 'HouseController' );

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HouseController@index')->name('home');
Route::get('/about', function (){return view('about');})->name('about');
Route::get('/contact', function (){return view('contact');})->name('contact');
Route::get('/test', function (\App\House $house){return view('test');})->name('test');
