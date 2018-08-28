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

Route::get('/', 'MainController@index' )->name('paste.create');
Route::post('/', 'MainController@store' )->name('paste.store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::post('ulogin', 'UloginController@login');
Route::get('/paste/{random_url}', 'MainController@paste')->name('paste');
Route::get('auth/redirect/{provider}', 'SocialAuthController@redirect');
Route::get('auth/callback/{provider}', 'SocialAuthController@callback');
Route::get('google', function () {
    return view('googleAuth');
});
Route::get('auth/google', 'Auth\AuthController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\AuthController@handleGoogleCallback');