<?php

// use Illuminate\Support\Facades\Route;

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

Route::get('admin/image/create', 'Admin\ImagesController@add')->middleware('auth');
Route::post('admin/image/create', 'Admin\ImagesController@create')->middleware('auth');
Route::get('admin/image/index', 'Admin\ImagesController@index')->middleware('auth');
Route::get('/', 'ImagesController@index')->middleware('auth');
Route::get('admin/image/show', 'Admin\ImagesController@show')->middleware('auth');
Route::get('delete', 'Admin\ImagesController@delete');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
