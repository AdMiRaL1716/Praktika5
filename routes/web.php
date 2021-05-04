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

Auth::routes();

// Generals controllers
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/countries/{id}', [App\Http\Controllers\HomeController::class, 'countries'])->name('countries/{id}');
Route::get('/country/{id}', [App\Http\Controllers\HomeController::class, 'country'])->name('country/{id}');
Route::get('/cities/{id}', [App\Http\Controllers\HomeController::class, 'cities'])->name('cities/{id}');
Route::get('/city/{id}', [App\Http\Controllers\HomeController::class, 'city'])->name('city/{id}');

// Cities
Route::get('/add-city', [App\Http\Controllers\CityController::class, 'addCity'])->name('add-city');
Route::post('/new-city', [App\Http\Controllers\CityController::class, 'create'])->name('new-city');
Route::get('/delete-city/{id}', [App\Http\Controllers\CityController::class, 'deleteCity'])->name('delete-city/{id}');
Route::post('/delete-city/{id}', [App\Http\Controllers\CityController::class, 'delete'])->name('delete-city/{id}');
Route::get('/edit-city/{id}', [App\Http\Controllers\CityController::class, 'editCity'])->name('edit-city/{id}');
Route::post('/edit-city/{id}', [App\Http\Controllers\CityController::class, 'edit'])->name('edit-city/{id}');

// Countries
Route::get('/add-country', [App\Http\Controllers\CountryController::class, 'addCountry'])->name('add-country');
Route::post('/new-country', [App\Http\Controllers\CountryController::class, 'create'])->name('new-country');
Route::get('/delete-country/{id}', [App\Http\Controllers\CountryController::class, 'deleteCountry'])->name('delete-country/{id}');
Route::post('/delete-country/{id}', [App\Http\Controllers\CountryController::class, 'delete'])->name('delete-country/{id}');
Route::get('/edit-country/{id}', [App\Http\Controllers\CountryController::class, 'editCountry'])->name('edit-country/{id}');
Route::post('/edit-country/{id}', [App\Http\Controllers\CountryController::class, 'edit'])->name('edit-country/{id}');

// Continents
Route::get('/add-continent', [App\Http\Controllers\ContinentController::class, 'addContinent'])->name('add-continent');
Route::post('/new-continent', [App\Http\Controllers\ContinentController::class, 'create'])->name('new-continent');
Route::get('/delete-continent/{id}', [App\Http\Controllers\ContinentController::class, 'deleteContinent'])->name('delete-continent/{id}');
Route::post('/delete-continent/{id}', [App\Http\Controllers\ContinentController::class, 'delete'])->name('delete-continent/{id}');
Route::get('/edit-continent/{id}', [App\Http\Controllers\ContinentController::class, 'editContinent'])->name('edit-continent/{id}');
Route::post('/edit-continent/{id}', [App\Http\Controllers\ContinentController::class, 'edit'])->name('edit-continent/{id}');
