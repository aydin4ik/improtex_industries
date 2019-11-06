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
    
    Route::get('/news/{category?}', function ($category = null) {
        return view('welcome')->with('category', $category);
    })->name('news');

    Route::get('/scope-of-business', function () {
        return view('welcome');
    })->name('scope-of-business');

    Route::get('/products', function () {
        return view('welcome');
    })->name('products');

    Route::get('/projects', function () {
        return view('welcome');
    })->name('projects');

    Route::get('/contacts', function () {
        return view('welcome');
    })->name('contacts');

});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});