<?php

use Illuminate\Support\Facades\Auth;
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

// Pagina's
Route::get('/beheer/paginas', 'PageController@index')->middleware('auth')->name('beheer.pages.index');
Route::get('/beheer/paginas/create', 'PageController@create')->middleware('auth')->name('beheer.pages.create');
Route::post('/beheer/paginas/create', 'PageController@store')->middleware('auth')->name('beheer.pages.store');
Route::get('/beheer/paginas/{product}/edit', 'PageController@edit')->middleware('auth')->name('beheer.pages.edit');
Route::patch('/beheer/paginas/{product}', 'PageController@update')->middleware('auth')->name('beheer.pages.update');
Route::delete('/beheer/paginas/{product}/delete', 'PageController@destroy')->middleware('auth')->name('beheer.pages.delete');

// Menu's
Route::get('/beheer/menus', 'MenuController@index')->middleware('auth')->name('beheer.menus.index');
Route::get('/beheer/menus/create', 'MenuController@create')->middleware('auth')->name('beheer.menus.create');
Route::post('/beheer/menus/create', 'MenuController@store')->middleware('auth')->name('beheer.menus.store');
Route::get('/beheer/menus/{menu}/edit', 'MenuController@edit')->middleware('auth')->name('beheer.menus.edit');
Route::patch('/beheer/menus/{menu}', 'MenuController@update')->middleware('auth')->name('beheer.menus.update');
Route::delete('/beheer/menus/{menu}/delete', 'MenuController@destroy')->middleware('auth')->name('beheer.menus.delete');

// Menu's
Route::get('/beheer/afbeeldingen', 'ImageController@index')->middleware('auth')->name('beheer.images.index');
Route::get('/beheer/afbeeldingen/create', 'ImageController@create')->middleware('auth')->name('beheer.images.create');
Route::post('/beheer/afbeeldingen/create', 'ImageController@store')->middleware('auth')->name('beheer.images.store');
Route::get('/beheer/afbeeldingen/{menu}/edit', 'ImageController@edit')->middleware('auth')->name('beheer.images.edit');
Route::patch('/beheer/afbeeldingen/{menu}', 'ImageController@update')->middleware('auth')->name('beheer.images.update');
Route::delete('/beheer/afbeeldingen/{menu}/delete', 'ImageController@destroy')->middleware('auth')->name('beheer.images.delete');

// Clientside
Route::redirect('/', '/nl');

Route::group(['prefix' => '{language}'], function() {
	Route::get('/', function () {
    	return view('site.pages.home');
	})->name('site.pages.home');

    Route::get('/home', function () {
        return view('site.pages.home');
    })->name('site.pages.home');

    Route::get('/{page_slug}', 'PageController@show')->name('page.show');
});
