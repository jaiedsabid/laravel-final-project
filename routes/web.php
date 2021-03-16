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
})->name('home');

/* Common */
Route::get('/login','Log_Reg_Controller@login_index')->name('login');
Route::post('/login','Log_Reg_Controller@login_check');
Route::get('/logout','LogOutController@index')->name('logout');

/* Admin Routes */

Route::get('/dashboard', 'AdminController@index')->name('admin.index');
Route::get('/admin/profile', 'AdminController@show_profile')->name('admin.profile');
Route::get('/admin/profile/edit', 'AdminController@edit_profile')->name('admin.edit_profile');
Route::post('/admin/profile/edit', 'AdminController@update_profile');

Route::get('/admin/users/user/list', 'AdminController@user_list')->name('admin.user_list');
Route::get('/admin/users/user/{id}/view', 'AdminController@view_user')->name('admin.view_user');
Route::get('/admin/users/user/{id}/edit', 'AdminController@edit_user')->name('admin.edit_user');
Route::post('/admin/users/user/{id}/edit', 'AdminController@update_user');
Route::get('/admin/users/user/{id}/delete', 'AdminController@delete_user')->name('admin.delete_user');

Route::get('/admin/users/admin/list', 'AdminController@admin_list')->name('admin.admin_list');


/* User Routes */

Route::get('/register','Log_Reg_Controller@reg_index')->name('register');
Route::post('/register','Log_Reg_Controller@reg_check');


Route::get('/user/dashboard','UserController@index')->name('user.home');


Route::get('/user/update','UserController@update')->name('user.update');
Route::post('/user/update','UserController@store');


Route::get('/user/changeimage','UserController@updateImage')->name('user.updateImage');
Route::post('/user/changeimage','UserController@storeImage');


Route::get('/user/update-subscription','UserController@update_subs')->name('user.update_subs');
