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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::('/', function() {
    return view('home');
})

Route::resource('program', 'ProgramController');
Route::resource('admin', 'AdminController');
Route::resource('speaker', 'SpeakerController');
Route::resource('sponsor', 'SponsorController');
Route::resource('user', 'UserController');
