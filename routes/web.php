<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

/**
 * User routes - Non-Authenticated
 */
Route::get('/', function(){
    return view('welcome');
})->name('index');
/**
// Login Routes
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/login/submit', 'Auth\LoginController@login')->name('admin.login.submit');

// Logout Routes
Route::post('/logout/submit', 'Auth\LoginController@logout')->name('admin.logout.submit');

// Forget Password Routes
Route::get('/password/reset', 'Auth\ForgetPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/password/reset/submit', 'Auth\ForgetPasswordController@reset')->name('admin.password.update');
**/

/**
 * User routes - Non-Authenticated
 */
Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

/**
 * Admin routes - Authenticated
 */
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/', 'Backend\DashboardController@index')->name('admin.dashboard');
    Route::resource('roles', 'Backend\RolesController', ['names' => 'admin.roles']);
    Route::resource('users', 'Backend\UsersController', ['names' => 'admin.users']);
    Route::resource('admins', 'Backend\AdminsController', ['names' => 'admin.admins']);
    Route::resource('permissions', 'Backend\PermissionController', ['names' => 'admin.permissions']);
});

/**
 * Admin routes - Non-Authenticated
 */
Route::group(['prefix' => 'admin'], function () {

    // Login Routes
    Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Backend\Auth\LoginController@login')->name('admin.login.submit');

    // Logout Routes
    Route::post('/logout/submit', 'Backend\Auth\LoginController@logout')->name('admin.logout.submit');

    // Forget Password Routes
    Route::get('/password/reset', 'Backend\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset/submit', 'Backend\Auth\ForgotPasswordController@reset')->name('admin.password.update');
});
