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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

// Route::resource('products', 'ProductController');

// Route::resource('products', 'ProductController');

// Route::resource('users', 'usersController');

// Route::resource('products', 'ProductController');

// Route::resource('products', 'ProductController');

// Route::resource('incidents', 'incidentsController');

// Route::resource('dataUsers', 'data_usersController');

// Route::resource('products', 'ProductController');

// Route::resource('incidents', 'incidentsController');

// Route::resource('dataUsers', 'data_usersController');

Route::resource('products', 'ProductController');

Route::resource('incidents', 'incidentsController');

Route::resource('dataUsers', 'data_usersController');

Route::get('/maps', function () {
    return view('bootstrap.index');
});