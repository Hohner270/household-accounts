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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['guest'])->group(function () {
Route::get('/signIn', 'AuthController@signIn');
Route::post('/signIn', 'AuthController@check');

Route::get('/signUp', 'UsersController@create');
Route::post('/signUp', 'UsersController@store');
// });

// Route::middleware(['auth'])->group(function () {
Route::get('/', 'HomeController@index');
// });