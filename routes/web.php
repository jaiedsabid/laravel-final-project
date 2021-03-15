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

Route::get('/login','Log_Reg_Controller@index');
Route::post('/login','Log_Reg_Controller@index');
Route::get('/registration','Log_Reg_Controller@index');
Route::post('/registration','Log_Reg_Controller@index');



/* Admin Routes */

Route::get('/dashboard', 'AdminController@index')->name('admin.index');
