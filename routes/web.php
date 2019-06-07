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
//subtenant
Route::group(['prefix' => 'subtenant', 'middleware'=>['role:subtenant']], function (){
    Route::get('/properties', 'SubtenantController@index')->name('subtenant.index');
    Route::get('/property/makeOffer/{house}', 'SubtenantController@makeOffer')->name('subtenant.makeOffer');
    Route::get('/offers', 'SubtenantController@offers')->name('subtenant.offers');
    Route::post('/property/makeOffer/{house}', 'SubtenantController@storeOffer')->name('subtenant.storeOffer');
    Route::get('/property/myOffers/{offer}', 'SubtenantController@editOffer')->name('subtenant.editOffer');
    Route::put('/property/makeOffer/{house}', 'SubtenantController@updateOffer')->name('subtenant.updateOffer');
    Route::delete('/property/offer/{offer}','SubtenantController@deleteOffer')->name('subtenant.deleteOffer');
});
//lessor
Route::group(['prefix'=> 'lessor','middleware' => ['role:lessor']], function (){
    Route::resource('house', 'LessorController', ['except' => ['show']] );
    Route::get('/house/offers/{offer}', 'LessorController@offers')->name('lessor.offers');
    Route::patch('/house/offers/reject/{offer}','LessorController@rejectOffer')->name('lessor.rejectOffer');
    Route::patch('/house/offers/accept/{offer}', 'LessorController@acceptOffer')->name('lessor.acceptOffer');
});
//auth
Auth::routes();
//guest
Route::get('/', 'HomeController@index')->name('home');
Route::get('/properties/all', 'SubtenantController@showAllProperties')->name('subtenant.allProperties');
Route::get('/property/{house}', 'SubtenantController@show')->name('subtenant.show');
Route::resource('house/comment', 'CommentController', ['except' => ['index','create','store']]);
Route::get('/house/comments/{house}', 'CommentController@index')->name('comment.index');
Route::post('/house/comment/{house}', 'CommentController@store')->name('comment.store');
//all
Route::get('/about', function (){return view('about');})->name('about');
Route::get('/contact', function (){return view('contact');})->name('contact');
Route::get('/test',"SubtenantController@offers")->name('test');

