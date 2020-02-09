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

Route::localized(function() {

    Route::get('/menu', 'API\menuController@index')->name('menu');

    Route::get('/', function () {
        return view('welcome');
    })->name('home');
    
    Route::get('about', 'ShowAbout')->name('about');

    Route::get('news', function () {
        return view('welcome');
    })->name('news');

    Route::resource('scope', 'ScopeController')->only([
        'index', 'show'
    ]);

    Route::resource('products', 'ProductController')->only([
        'index', 'show'
    ]);

    Route::resource('projects', 'ProjectController')->only([
        'index', 'show'
    ]);

    Route::post('projects' , 'ProjectController@load');



    Route::get('/contacts', function () {
        return view('welcome');
    })->name('contacts');

    Route::post('/search', 'SearchFormController@submit');
    Route::get('/search', 'SearchFormController@submit');

});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});