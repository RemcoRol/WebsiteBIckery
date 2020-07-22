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

// ADMINISTRATOR
Auth::routes();

// Standaard
Route::get('/beheer', 'HomeController@index')->middleware('auth')->name('beheer.home');

// Categoriën
Route::get('/beheer/categorien', 'CategoryController@index')->middleware('auth')->name('beheer.categories.index');
Route::get('/beheer/categorien/create', 'CategoryController@create')->middleware('auth')->name('beheer.categories.create');
Route::post('/beheer/categorien/create', 'CategoryController@store')->middleware('auth')->name('beheer.categories.store');
Route::get('/beheer/categorien/{categorie}/edit', 'CategoryController@edit')->middleware('auth')->name('beheer.categories.edit');
Route::patch('/beheer/categorien/{categorie}', 'CategoryController@update')->middleware('auth')->name('beheer.categories.update');
Route::delete('/beheer/categorien/{categorie}/delete', 'CategoryController@destroy')->middleware('auth')->name('beheer.categories.delete');

// Merken
Route::get('/beheer/merken', 'BrandController@index')->middleware('auth')->name('beheer.brands.index');
Route::get('/beheer/merken/create', 'BrandController@create')->middleware('auth')->name('beheer.brands.create');
Route::post('/beheer/merken/create', 'BrandController@store')->middleware('auth')->name('beheer.brands.store');
Route::get('/beheer/merken/{merk}/edit', 'BrandController@edit')->middleware('auth')->name('beheer.brands.edit');
Route::patch('/beheer/merken/{merk}', 'BrandController@update')->middleware('auth')->name('beheer.brands.update');
Route::delete('/beheer/merken/{merk}/delete', 'BrandController@destroy')->middleware('auth')->name('beheer.brands.delete');

// Producten
Route::get('/beheer/producten', 'ProductController@index')->middleware('auth')->name('beheer.products.index');
Route::get('/beheer/producten/create', 'ProductController@create')->middleware('auth')->name('beheer.products.create');
Route::post('/beheer/producten/create', 'ProductController@store')->middleware('auth')->name('beheer.products.store');
Route::get('/beheer/producten/{product}/edit', 'ProductController@edit')->middleware('auth')->name('beheer.products.edit');
Route::patch('/beheer/producten/{product}', 'ProductController@update')->middleware('auth')->name('beheer.products.update');
Route::delete('/beheer/producten/{product}/delete', 'ProductController@destroy')->middleware('auth')->name('beheer.products.delete');


// Clientside
Route::redirect('/', '/nl');

Route::group(['prefix' => '{language}'], function() {
	Route::get('/', function () {
    	return view('client.home');
	})->name('client.home');
});
