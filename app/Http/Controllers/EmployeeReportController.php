<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\AttendanceSummary;
use App\Models\SalarySheet;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeReportController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function employee_view_attendance(Request $request)
    {
    	$month = date('m');
        $year = date('Y');
        $employee_id = Auth::user()->id;

        $attendances  = Attendance::where([
                'employee_id' => $employee_id,
                'attendance_month' => $month,
                'attendance_year' => $year
            ])->orderBy('id', 'asc');

        $attendance_summary = AttendanceSummary::where([
                'employee_id' => $employee_id,
                'attendance_month' => $month,
                'attendance_year' => $year
            ])->orderBy('id', 'asc');

        if ($request->has('month')){
            $month = $request->month;
            $year = $request->year;

            $attendances  = Attendance::where([
                'employee_id' => $employee_id,
                'attendance_month' => $month,
                'attendance_year' => $year
            ])->orderBy('id', 'asc');

            $attendance_summary = AttendanceSummary::where([
                'employee_id' => $employee_id,
                'attendance_month' => $month,
                'attendance_year' => $year
            ])->orderBy('id', 'asc');
        }

        $attendances  = $attendances->get();
        $attendance_summary  = $attendance_summary->first();

        return view('employee_reports.employee_attendance', compact('attendances', 'attendance_summary', 'month', 'year'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function employee_view_payslip(Request $request)
    {
        $month = date('m');
        $year = date('Y');
        $employee_id = Auth::user()->id;

        $employee_payslips  = SalarySheet::where([
                'employee_id' => $employee_id,
                'salary_month' => $month,
                'salary_year' => $year
            ])->orderBy('id', 'asc');

        $employee = Employee::with(['department', 'designation', 'schedule'])->where('id', 1)->first();

        if ($request->has('month')){
            $month = $request->month;
            $year = $request->year;

            $employee_payslips  = SalarySheet::where([
                'employee_id' => $employee_id,
                'salary_month' => $month,
                'salary_year' => $year
            ])->orderBy('id', 'asc');
        }

        $employee_payslips  = $employee_payslips->get();

        return view('employee_reports.employee_payslip', compact('employee_payslips', 'employee', 'month', 'year'));
    }
}
