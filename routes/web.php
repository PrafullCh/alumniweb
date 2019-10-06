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

Route::get('/', 'PagesController@index');
Route::get('/index', 'PagesController@index')->name('index');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::get('/donation', 'PagesController@donation')->name('donation');
Route::get('/directory', 'PagesController@directory')->name('directory');
Route::get('/yearbook', 'PagesController@yearbook')->name('yearbook');
Route::any('/showdepartments/{year}', 'PagesController@showDept')->name('departments');
Route::any('/showbatches/{year}/{dept}', 'PagesController@showBatches')->name('batches');
Route::post('records','PagesController@directoryRecords');
Route::post('/checkuser','Students@checkUser')->name('userregister');
Route::get('/register', 'Students@verifyUser');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verify', 'Students@verifyUser')->name('verify');
Route::get('/users/logout','Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function(){
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');   
    Route::post('/password/reset','Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});

