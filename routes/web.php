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

Route::get('/', 'ProjectController@index')->name('home');

/* Common */
Route::get('/login','Log_Reg_Controller@login_index')->name('login');
Route::post('/login','Log_Reg_Controller@login_check');
Route::get('/logout','LogOutController@index')->name('logout');

/* Admin Routes */

Route::get('/dashboard', 'AdminController@index')->name('admin.index');
Route::get('/admin/profile', 'AdminController@show_profile')->name('admin.profile');
Route::get('/admin/profile/edit', 'AdminController@edit_profile')->name('admin.edit_profile');
Route::post('/admin/profile/edit', 'AdminController@update_profile');

Route::get('/admin/users', 'AdminController@user_index')->name('admin.user_index');

Route::get('/admin/create/users', 'AdminController@create')->name('admin.create_users');
Route::post('/admin/create/users', 'AdminController@store');

Route::get('/admin/users/user/list', 'AdminController@user_list')->name('admin.user_list');
Route::post('/admin/users/user/list', 'AdminController@search')->name('admin.user_list');
Route::get('/admin/users/user/{id}/view', 'AdminController@show')->name('admin.view_user');
Route::get('/admin/users/user/{id}/edit', 'AdminController@edit')->name('admin.edit_user');
Route::post('/admin/users/user/{id}/edit', 'AdminController@update');
Route::get('/admin/users/user/{id}/delete', 'AdminController@destroy')->name('admin.delete_user');

Route::get('/admin/users/admin/list', 'AdminController@admin_list')->name('admin.admin_list');
Route::post('/admin/users/admin/list', 'AdminController@search')->name('admin.admin_list');
Route::get('/admin/users/admin/{id}/view', 'AdminController@show')->name('admin.view_admin');
Route::get('/admin/users/admin/{id}/edit', 'AdminController@edit')->name('admin.edit_admin');
Route::post('/admin/users/admin/{id}/edit', 'AdminController@update');
Route::get('/admin/users/admin/{id}/delete', 'AdminController@destroy')->name('admin.delete_admin');

Route::get('/admin/subscription/list', 'AdminController@subs_list')->name('admin.subs_list');
Route::get('/admin/subscription/list/{id}/view', 'AdminController@subs_view')->name('admin.subs_view');
Route::get('/admin/subscription/list/{id}/edit', 'AdminController@subs_edit')->name('admin.subs_edit');
Route::post('/admin/subscription/list/{id}/edit', 'AdminController@subs_update');
Route::get('/admin/subscription/list/{id}/delete', 'AdminController@subs_delete')->name('admin.subs_delete');
Route::get('/admin/subscription/create/package', 'AdminController@subs_create')->name('admin.subs_create');
Route::post('/admin/subscription/create/package', 'AdminController@subs_store');

Route::get('/admin/project/', 'AdminController@project')->name('admin.project');
Route::get('/admin/project/active', 'AdminController@active_projects')->name('admin.project_active');
Route::get('/admin/project/pending', 'AdminController@pending_projects')->name('admin.project_pending');
Route::get('/admin/project/closed', 'AdminController@closed_projects')->name('admin.project_closed');
Route::get('/admin/project/list', 'AdminController@project_list')->name('admin.project_list');
Route::get('/admin/project/{id}/details', 'AdminController@project_details')->name('admin.project_details');
Route::get('/admin/project/{id}/approve', 'AdminController@project_approve')->name('admin.project_approve');
Route::get('/admin/project/{id}/delete', 'AdminController@project_delete')->name('admin.project_delete');

/* User Routes */

Route::get('/register','Log_Reg_Controller@reg_index')->name('register');
Route::post('/register','Log_Reg_Controller@reg_check');


Route::get('/user/dashboard','UserController@index')->name('user.home');


Route::get('/user/update','UserController@update')->name('user.update');
Route::post('/user/update','UserController@store');


Route::get('/user/changeimage','UserController@updateImage')->name('user.updateImage');
Route::post('/user/changeimage','UserController@storeImage');


Route::get('/user/update-subscription','UserController@update_subs')->name('user.update_subs');




Route::get('/user/new-proj','ProjectController@newProj')->name('proj.newProj');
Route::post('/user/new-proj','ProjectController@storeNewProj');


Route::get('/user/view-proj','ProjectController@viewProj')->name('proj.viewProj');

Route::get('/user/update-proj','ProjectController@updateProj')->name('proj.updateProj');

Route::get('/user/update-projform/{id}','ProjectController@updateProjForm')->name('proj.updateProjForm');
Route::post('/user/update-projform/{id}','ProjectController@storeProjForm');

Route::get('/user/delete-proj/{id}','ProjectController@deleteProjView')->name('proj.deleteProjForm');
Route::post('/user/delete-proj/{id}','ProjectController@deleteProj');
