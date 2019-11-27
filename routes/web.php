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
Route::get('/map', 'PagesController@map')->name('map');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::get('/donation', 'PagesController@donation')->name('donation');
Route::get('/gallery', 'PagesController@gallery')->name('gallery');
Route::get('/gallery/{id}', 'PagesController@viewgallery')->name('pages.viewgallery');
Route::get('/deletenotification/{id}','NotificationSystem@deleteNotification')->name('user.delete.notification');
Route::get('/directory', 'PagesController@directory')->name('directory');
Route::get('/yearbook', 'PagesController@yearbook')->name('yearbook');
Route::any('/yearbook/{year}', 'PagesController@showDept')->name('departments');
Route::any('/showbatches/{year}/{dept}', 'PagesController@showBatches')->name('batches');
Route::post('records','PagesController@directoryRecords')->name('records');
Route::post('/checkuser','Students@checkUser')->name('userregister');
Route::get('/register', 'Students@verifyUser');
Route::delete('/posts/admindelete/{id}','Postscontroller@adminDestroy')->name('admindelete');
Route::resource('posts','Postscontroller');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verify', 'Students@verifyUser')->name('verify');
Route::get('/users/logout','Auth\LoginController@userLogout')->name('user.logout');
Route::get('markAllAsRead',function(){
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markAllRead');
Route::get('/markAsRead/{id}',function($id){
    $count=0;
    foreach (auth()->user()->unreadNotifications as $notification) {
        $notification->markAsRead();
        $count++;
        if($count==$id)
            $notification->markAsRead();
    }
    return redirect()->back();
})->name('markRead');
Route::prefix('admin')->group(function(){
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/icons', 'AdminController@icons')->name('admin.icons');
    Route::get('/map', 'AdminController@map')->name('admin.map');
    Route::get('/notifications', 'AdminController@notifications')->name('admin.notifications');
    // Route::get('/rtl', 'AdminController@rtl')->name('admin.rtl');
    Route::get('/admingallery', 'AdminController@gallery')->name('admin.admingallery');
    Route::get('/admingallery/{id}', 'AdminController@viewadmingallery')->name('admin.viewgallery');
    Route::get('/newgallery', 'AdminController@newGallery')->name('admin.createnewgallery');
    Route::post('/storeNewGallery','AdminController@storeNewGallery');
    Route::delete('/deletegallery/{id}','AdminController@deleteGallery');
    Route::delete('/deleteimage/{id}','AdminController@deleteImage');
    Route::get('/addNewImages/{id}','AdminController@addImages')->name('admin.addNewImages');
    Route::post('/addNewImages','AdminController@storeNewImages')->name('admin.storeNewImages');
    Route::get('/typography', 'AdminController@typography')->name('admin.typography');
    Route::get('/user', 'AdminController@user')->name('admin.user');
    Route::get('/user/{id}', 'AdminController@viewRecord')->name('admin.record');
    Route::post('/user/{id}', 'AdminController@viewRecord')->name('admin.record');
    Route::get('/viewuser/{id}', 'AdminController@markAsFake')->name('admin.fakemark');
    Route::put('/viewuser/{id}', 'AdminController@markAsVerified')->name('admin.verifiedmark');
    Route::get('/adminblog', 'AdminController@adminblog')->name('admin.adminblog');
    Route::get('/getreceipt','AdminController@getDocument')->name('admin.document');
    Route::get('/notification','AdminController@notification')->name('admin.notification');
    Route::post('/notify', 'NotificationSystem@userNotify')->name('admin.notifyEmail');
    Route::post('/notifyDB', 'NotificationSystem@userNotifyDB')->name('admin.notifyDB');
    Route::get('/validate/{rollno}','NotificationSystem@validateRollno')->name('rollno');
    Route::get('/deletenotification/{id}','NotificationSystem@deleteNotification')->name('admin.delete.notification');
    Route::get('/settings','AdminController@settings')->name('admin.settings');
    Route::post('/changeblogsetting','SettingController@changeBlogSetting');
    Route::post('/changedirectorysetting','SettingController@changeDirectorySetting');
    Route::post('/changeyearbooksetting','SettingController@changeYearbookSetting');
    Route::post('/changeaboutussetting','SettingController@changeAboutUsSetting');
    Route::post('/changecontactussetting','SettingController@changeContactUsSetting');
    Route::post('/changegallerysetting','SettingController@changeGallerySetting');
    Route::post('/changedonationsetting','SettingController@changeDonationSetting');
    Route::post('/changeloginsetting','SettingController@changeLoginSetting');
    Route::post('/changeregistersetting','SettingController@changeRegisterSetting');
    // Route::get('/adminblog', 'AdminController@adminblogedit')->name('admin.adminblogedit');
    Route::get('/studentdirectory', 'AdminController@studentDirectory')->name('admin.studentdirectory');
    Route::post('/fakestudent','AdminController@fakeStudent');
    Route::post('/authorisedstudent','AdminController@authorisedStudent');
    Route::post('/rollno','AdminController@rollnoList');
    Route::delete('/deleteuser/{id}','AdminController@deleteUser');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');   
    Route::post('/password/reset','Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

});

