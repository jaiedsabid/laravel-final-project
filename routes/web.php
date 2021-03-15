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


/* Admin Routes */

Route::get('/dashboard', 'AdminController@index')->name('admin.index');


/* User Routes */

Route::get('/register','Log_Reg_Controller@reg_index')->name('register');
Route::post('/register','Log_Reg_Controller@reg_check');
