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
Route::get('/companies/destroy/{id}', 'CompanyController@destroy')->name('companies.destroy');

Route::resource('departments', 'DepartmentController');
Route::get('/departments/destroy/{id}', 'DepartmentController@destroy')->name('departments.destroy');

Route::resource('designations', 'DesignationController');
Route::get('/designations/destroy/{id}', 'DesignationController@destroy')->name('designations.destroy');

Route::resource('schedules', 'ScheduleController');
Route::get('/schedules/destroy/{id}', 'ScheduleController@destroy')->name('schedules.destroy');

Route::resource('leaves', 'LeaveController');
Route::get('/leaves/destroy/{id}', 'LeaveController@destroy')->name('leaves.destroy');

Route::resource('taxs', 'TaxController');
Route::get('/taxs/destroy/{id}', 'TaxController@destroy')->name('taxs.destroy');

Route::resource('provident_founds', 'ProvidentFundController');
Route::get('/provident_founds/destroy/{id}', 'ProvidentFundController@destroy')->name('provident_founds.destroy');

// Employee Management
Route::resource('employees', 'EmployeeController');
Route::post('employees/updated/{id}', 'EmployeeController@update')->name('employees.updated');
Route::get('/employees/destroy/{id}', 'EmployeeController@destroy')->name('employees.destroy');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return redirect()->route('home');
})->name('clear-cache');
