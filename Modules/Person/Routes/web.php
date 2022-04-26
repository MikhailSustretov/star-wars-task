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

use Illuminate\Support\Facades\Route;

Route::prefix('people')->group(function() {
    Route::get('/', 'PersonController@index')->name('people.index');

    Route::get('/create', 'PersonController@create')->name('people.create');

    Route::post('/', 'PersonController@store')->name('people.store');

    Route::get('/{person}/edit', 'PersonController@edit')->name('people.edit');

    Route::patch('/{person}', 'PersonController@update')->name('people.update');

    Route::delete('/{person}', 'PersonController@destroy')->name('people.destroy');
});
