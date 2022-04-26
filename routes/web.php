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

Route::get('/', 'PersonController@index');

Route::get('/people/create', 'PersonController@create');

Route::post('/store', 'PersonController@store');

Route::get('/people/{person}/edit', 'PersonController@edit');

Route::patch('/people/{person}', 'PersonController@update');

Route::delete('/people/{person}', 'PersonController@destroy');

Route::get('/homeworlds', 'HomeworldController@index');

Route::post('/homeworlds', 'HomeworldController@show');

Route::delete('/images/{image}', 'ImageController@destroy');

Route::patch('/person-images/{person}', 'PersonController@updateImages');
