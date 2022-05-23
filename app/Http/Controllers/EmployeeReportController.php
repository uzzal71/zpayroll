<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeReportController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function employee_view_report(Request $request)
    {
    	$month = date('m');
        $year = date('Y');
        $employee_id = 1; // Auth::user()->id

        $attendances  = Attendance::where([
                'employee_id' => $employee_id,
                'attendance_month' => '04',
                'attendance_year' => $year
            ])->orderBy('id', 'asc');

        if ($request->has('month')){
            $month = $request->month;
            $year = $request->year;
            $attendances  = $attendances->where([
                'employee_id' => $employee_id,
                'attendance_month' => $month,
                'attendance_year' => $year
            ]);
        }

        $attendances  = $attendances ->get();

        return view('employee_reports.employee_attendance', compact('attendances', 'month', 'year'));
    }
}
