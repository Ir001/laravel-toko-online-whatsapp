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
    Route::get('login', 'App\Http\Controllers\Seller\LoginController@index')->name('seller.login');
    Route::get('logout', 'Seller\LoginController@logout')->name('seller.logout');
    Route::post('login', 'Seller\LoginController@login');
    Route::get('register', 'Seller\RegisterController@index')->name('seller.register');
    Route::post('register', 'Seller\RegisterController@register');
    Route::group(['middleware' => ['auth:seller']], function () {
        Route::get('dashboard', 'Seller\DashboardController@index')->name('seller.dashboard');
        // Product
        Route::get('product', 'Seller\ProductController@index')->name('seller.product');
        Route::get('product/create', 'Seller\ProductController@create')->name('seller.product.create');
        Route::post('product', 'Seller\ProductController@store')->name('seller.product.store');
        Route::get('product/{product:slug}/edit', 'Seller\ProductController@edit');
        Route::patch('product/{product:slug}', 'Seller\ProductController@update');
        Route::delete('product/{product:slug}', 'Seller\ProductController@destroy');

        Route::get('profile', 'Seller\ProfileController@index')->name('seller.profile');
        Route::get('setting', 'Seller\SettingController@index')->name('seller.setting');
    });
});
Route::group(['prefix' => 'buyer'], function () {
    Route::get('login', 'App\Http\Controllers\Buyer\LoginController@index')->name('login');
    Route::get('logout', 'Buyer\LoginController@index')->name('logout');

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
