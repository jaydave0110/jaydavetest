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

Route::get('/', function () {
    return view('welcome');
});


Route::group(array('prefix'=>'/admin','namespace' => 'App\Http\Controllers\Admin'), 
	function ()
	{ 
		Route::get('/', 'LoginController@showLoginForm')->name('admin.showlogin');
	     
		Route::post('/', 'LoginController@login')->name('admin.login');
		Route::post('admin-password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
		Route::get('admin-password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
		Route::post('admin-password/reset', 'ResetPasswordController@reset');
		Route::get('admin-password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');

		Route::post('admin/logout', 'LoginController@logout')->name('admin.logout');	

		Route::resource('companies','CompaniesContoller');
		Route::resource('employees','EmployeesContoller');

	});


Route::get('admin/home', 'App\Http\Controllers\AdminController@index')->name('admin.home');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
