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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('companies', 'CompanyController');
Route::get('/companies/edit/{id}', 'CompanyController@edit')->name('companies.edit');
Route::get('/companies/destroy/{id}', 'CompanyController@destroy')->name('companies.destroy');
Route::post('/companies/update', 'CompanyController@update')->name('companies.udate');
