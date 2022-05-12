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
Route::resource('departments', 'DepartmentController');
Route::resource('designations', 'DesignationController');
Route::resource('schedules', 'ScheduleController');
Route::resource('leaves', 'LeaveController');
Route::resource('taxs', 'TaxController');
Route::resource('provident_founds', 'ProvidentFundController');

// Employee Management
Route::resource('employees', 'EmployeeController');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return redirect()->route('home');
})->name('clear-cache');
