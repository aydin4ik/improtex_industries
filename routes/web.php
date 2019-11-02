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

    Route::get('/', function () {
        return view('welcome');
    })->name('home');
    
    Route::get('/about', function () {
        return view('welcome');
    })->name('about');
    
    Route::get('/news', function () {
        return view('welcome');
    });
     
    Route::get('/news/project-update', function () {
        return view('welcome');
    });
    
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});