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

Route::get('admin/image/create', 'Admin\ImagesController@add');
Route::post('admin/image/create', 'Admin\ImagesController@create');
Route::get('admin/image/index', 'Admin\ImagesController@index');
Route::get('/', 'ImagesController@index');
Route::get('admin/image/show', 'Admin\ImagesController@show');
Route::get('delete', 'Admin\ImagesController@delete');
