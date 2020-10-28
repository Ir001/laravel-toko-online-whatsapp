<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'LandingpageController@index');

// Auth::routes();
Route::group(['prefix' => 'admin-panel'], function () {
    /* Login */
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    /* Logout */
    Route::post('logout', 'Auth\LoginController@logout');
    Route::get('logout', 'Auth\LoginController@logout');
    /* Forgot Password  */
    Route::match(['get', 'head'], 'password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm');
    Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::match(['get', 'head'], 'password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/reset', 'Auth\ForgotPasswordController@reset')->name('password.update');
    Route::match(['get', 'head'], 'password/reset/{token}', 'Auth\ForgotPasswordController@showResetForm')->name('password.reset');
});

Route::get('admin-panel', 'HomeController@index')->name('home');
