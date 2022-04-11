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

Route::get('/', 'PersonController@index')->name('people.index');

Route::get('/people/create', 'PersonController@create')->name('people.create');

Route::post('/store', 'PersonController@store')->name('people.store');

Route::get('/people/{person}/edit', 'PersonController@edit')->name('people.edit');

Route::patch('/people/{person}', 'PersonController@update')->name('people.update');

Route::delete('/people/{person}', 'PersonController@destroy')->name('people.destroy');

Route::get('/homeworlds', 'HomeworldController@index')->name('homeworlds.index');

Route::post('/homeworlds', 'HomeworldController@show')->name('homeworlds.show');

Route::delete('/images/{image}', 'ImageController@destroy')->name('images.destroy');

Route::patch('/person-images/{person}', 'PersonController@updateImages')->name('people.images.update');
