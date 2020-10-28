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

Route::group(['prefix' => 'seller'], function () {
    Route::get('login', 'Seller\LoginController@index')->name('seller.login');
    Route::get('logout', 'Seller\LoginController@logout')->name('seller.logout');
    Route::post('login', 'Seller\LoginController@login');
    Route::get('register', 'Seller\RegisterController@index')->name('seller.register');
    Route::post('register', 'Seller\RegisterController@register');
    Route::group(['middleware' => ['auth:seller']], function () {
        Route::get('dashboard', 'Seller\DashboardController@index')->name('seller.dashboard');
        Route::get('product', 'Seller\ProductController@index')->name('seller.product');
        Route::get('profile', 'Seller\ProfileController@index')->name('seller.profile');
        Route::get('setting', 'Seller\SettingController@index')->name('seller.setting');
    });
});
Route::group(['prefix' => 'buyer'], function () {
    Route::get('login', 'Buyer\LoginController@index')->name('login');

});
Route::group(['prefix' => 'admin-panel'], function () {
    /* Login */
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
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
