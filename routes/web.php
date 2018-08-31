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

/* Роуты для добавления и ответа на запрос пасты */
Route::get('/', 'MainController@index' )->name('paste.create');
Route::post('/', 'PasteController@store' )->name('paste.store');
Route::get('/{hash}', 'PasteController@show')->name('paste.show');

/* Авторизация с регистрацией и страницей home, сгенерированная */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* Страница для отображения пасты пользователя */
Route::get('/mypaste', 'PasteController@mypaste')->name('myPaste');

/* Авторизация через Гитхаб */
Route::get('auth/redirect/{provider}', 'SocialAuthController@redirect');
Route::get('auth/callback/{provider}', 'SocialAuthController@callback');

/* Авторизация через Гугл аккаунт */
Route::get('google', function () {
    return view('googleAuth');
});
Route::get('auth/google', 'Auth\AuthController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\AuthController@handleGoogleCallback');