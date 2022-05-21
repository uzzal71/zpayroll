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

// Software Settings
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
//Route::post('employees/updated/{id}', 'EmployeeController@update')->name('employees.updated');
Route::get('/employees/destroy/{id}', 'EmployeeController@destroy')->name('employees.destroy');

// HR Management All Route
Route::resource('employee_leaves', 'EmployeeLeaveController');
Route::get('/employee_leaves/destroy/{id}', 'EmployeeLeaveController@destroy')->name('employee_leaves.destroy');

Route::resource('holiday_entries', 'HolidayEntryController');
Route::get('/holiday_entries/destroy/{id}', 'HolidayEntryController@destroy')->name('holiday_entries.destroy');

Route::resource('weekend_entries', 'WeekendEntryController');
Route::get('/weekend_entries/destroy/{id}', 'WeekendEntryController@destroy')->name('weekend_entries.destroy');

Route::resource('employee_promotions', 'EmployeePromotionController');
Route::get('/employee_promotions/destroy/{id}', 'EmployeePromotionController@destroy')->name('employee_promotions.destroy');

Route::resource('salary_increments', 'SalaryIncrementController');
Route::get('/salary_increments/destroy/{id}', 'SalaryIncrementController@destroy')->name('salary_increments.destroy');

// Payroll
Route::resource('upload', 'UploadController');
Route::get('/upload/destroy/{id}', 'UploadController@destroy')->name('upload.destroy');

//Manual Attendance Logs
Route::resource('attendances', 'AttendanceController');
Route::get('/approval/attendance', 'AttendanceController@approval_attendance')->name('approval.attendance');

// Cron Jobs
Route::resource('cronjobs', 'CronJobController');
Route::get('/cronjobs/destroy/{id}', 'CronJobController@destroy')->name('cronjobs.destroy');

// HR Report Route
Route::get('/daily-present', 'HRReportController@daily_present')->name('daily.present');
Route::post('/daily-present-preport', 'HRReportController@daily_present_report')->name('daily.present.report');

// Daily Absent Reports
Route::get('/daily-absent', 'HRReportController@daily_absent')->name('daily.absent');
Route::post('/daily-absent-preport', 'HRReportController@daily_absent_report')->name('daily.absent.report');

// Daily Late Reports
Route::get('/daily-late', 'HRReportController@daily_late')->name('daily.late');
Route::post('/daily-late-preport', 'HRReportController@daily_late_report')->name('daily.late.report');

// Daily Leave Reports
Route::get('/daily-leave', 'HRReportController@daily_leave')->name('daily.leave');
Route::post('/daily-leave-preport', 'HRReportController@daily_leave_report')->name('daily.leave.report');

// Daily Overtime Reports
Route::get('/daily-overtime', 'HRReportController@daily_overtime')->name('daily.overtime');
Route::post('/daily-overtime-preport', 'HRReportController@daily_overtime_report')->name('daily.overtime.report');

// Range Attendance
Route::get('/range-attendance', 'HRReportController@range_attendance')->name('range.attendance');
Route::post('/range-attendance-report', 'HRReportController@range_attendance_report')->name('range.attendance.report');

// Monthly Attendance Reports
Route::get('/monthly-attendance', 'HRReportController@monthly_attendance')->name('monthly.attendance');
Route::post('/monthly-attendance-preport', 'HRReportController@monthly_attendance_report')->name('monthly.attendance.report');

// Month Overtime Reports
Route::get('/monthly-overtime', 'HRReportController@monthly_overtime')->name('monthly.overtime');

// Salary Reports Route
Route::get('/salary-sheet', 'SalaryReportController@salary_sheet')->name('salary.sheet');
Route::get('/monthly-payslip', 'SalaryReportController@monthly_payslip')->name('monthly.payslip');
Route::get('/tax-report', 'SalaryReportController@tax_report')->name('tax.report');

// Systems Route
Route::resource('/users', 'UserController');
Route::get('/system-information', 'SystemController@system_information')->name('system.information');

// Ajax Route
Route::post('/ajax-get-employee', 'AjaxController@get_employee')->name('ajax.get_employee');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return redirect()->route('home');
})->name('clear-cache');
