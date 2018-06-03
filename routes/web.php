<?php

//use Schema;
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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('add', 'manage@addArticle');
Route::post('add', 'manage@addArticle');
Route::get('view/articles', 'manage@view');
Route::get('article/read/{id}', 'manage@read');
Route::post('article/read/{id}', 'manage@read');

