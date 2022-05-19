<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class HRReportController extends Controller
{
	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daily_present(Request $request)
    {
    	return view('hr_reports.daily_present');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daily_present_report(Request $request)
    {
        $from_date = $request->from_date;
        $employee_id = $request->employee_id;
        $results = Attendance::with(['employee'])
            ->where('attendance_date', $from_date)
            ->where('attendance_status', 'P')
            ->whereIn('employee_id', $employee_id)
            ->get();
        $company = DB::table('companies')->find(1);

        $data = [
            "company" => $company,
            'results' => $results
        ];

        $pdf = PDF::loadView('reports.daily_present_report', $data);
        $pdf->save('pdf/daily_present_report.pdf');
        return response()->download('pdf/daily_present_report.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daily_absent(Request $request)
    {
    	return view('hr_reports.daily_absent');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daily_absent_report(Request $request)
    {
        $from_date = $request->from_date;
        $employee_id = $request->employee_id;
        $results = Attendance::with(['employee'])
            ->where('attendance_date', $from_date)
            ->where('attendance_status', 'A')
            ->whereIn('employee_id', $employee_id)
            ->get();
        $company = DB::table('companies')->find(1);

        $data = [
            "company" => $company,
            'results' => $results
        ];

        $pdf = PDF::loadView('reports.daily_absent_report', $data);
        $pdf->save('pdf/daily_present_report.pdf');
        return response()->download('pdf/daily_absent_report.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daily_late(Request $request)
    {
    	return view('hr_reports.daily_late');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daily_late_report(Request $request)
    {
        $from_date = $request->from_date;
        $employee_id = $request->employee_id;
        $results = Attendance::with(['employee'])
            ->where('attendance_date', $from_date)
            ->where('attendance_status', 'L')
            ->whereIn('employee_id', $employee_id)
            ->get();
        $company = DB::table('companies')->find(1);

        $data = [
            "company" => $company,
            'results' => $results
        ];

        $pdf = PDF::loadView('reports.daily_late_report', $data);
        $pdf->save('pdf/daily_present_report.pdf');
        return response()->download('pdf/daily_late_report.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daily_leave(Request $request)
    {
    	return view('hr_reports.daily_leave');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daily_leave_report(Request $request)
    {
        $from_date = $request->from_date;
        $employee_id = $request->employee_id;
        $results = Attendance::with(['employee'])
            ->where('attendance_date', $from_date)
            ->where('attendance_status', 'P')
            ->whereIn('employee_id', $employee_id)
            ->get();
        $company = DB::table('companies')->find(1);

        $data = [
            "company" => $company,
            'results' => $results
        ];

        $pdf = PDF::loadView('reports.daily_leave_report', $data);
        $pdf->save('pdf/daily_present_report.pdf');
        return response()->download('pdf/daily_leave_report.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daily_overtime(Request $request)
    {
    	return view('hr_reports.daily_overtime');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daily_overtime_report(Request $request)
    {
        $from_date = $request->from_date;
        $employee_id = $request->employee_id;
        $results = Attendance::with(['employee'])
            ->where('attendance_date', $from_date)
            ->where('attendance_status', 'P')
            ->whereIn('employee_id', $employee_id)
            ->get();
        $company = DB::table('companies')->find(1);

        $data = [
            "company" => $company,
            'results' => $results
        ];

        $pdf = PDF::loadView('reports.daily_overtime_report', $data);
        $pdf->save('pdf/daily_present_report.pdf');
        return response()->download('pdf/daily_overtime_report.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function range_attendance(Request $request)
    {
    	return view('hr_reports.range_attendance');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function range_attendance_report(Request $request)
    {
        $from_date = $request->from_date;
        $employee_id = $request->employee_id;
        $results = Attendance::with(['employee'])
            ->where('attendance_date', $from_date)
            ->where('attendance_status', 'P')
            ->whereIn('employee_id', $employee_id)
            ->get();
        $company = DB::table('companies')->find(1);

        $data = [
            "company" => $company,
            'results' => $results
        ];

        $pdf = PDF::loadView('reports.range_attendance_report', $data);
        $pdf->save('pdf/daily_present_report.pdf');
        return response()->download('pdf/range_attendance_report.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function monthly_attendance(Request $request)
    {
    	return view('hr_reports.monthly_attendance');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function monthly_attendance_report(Request $request)
    {
        $from_date = $request->from_date;
        $employee_id = $request->employee_id;
        $results = Attendance::with(['employee'])
            ->where('attendance_date', $from_date)
            ->where('attendance_status', 'P')
            ->whereIn('employee_id', $employee_id)
            ->get();
        $company = DB::table('companies')->find(1);

        $data = [
            "company" => $company,
            'results' => $results
        ];

        $pdf = PDF::loadView('reports.monthly_attendance_report', $data);
        $pdf->save('pdf/daily_present_report.pdf');
        return response()->download('pdf/monthly_attendance_report.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function monthly_overtime(Request $request)
    {
    	return view('hr_reports.monthly_overtime');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function monthly_overtime_report(Request $request)
    {
        $from_date = $request->from_date;
        $employee_id = $request->employee_id;
        $results = Attendance::with(['employee'])
            ->where('attendance_date', $from_date)
            ->where('attendance_status', 'P')
            ->whereIn('employee_id', $employee_id)
            ->get();
        $company = DB::table('companies')->find(1);

        $data = [
            "company" => $company,
            'results' => $results
        ];

        $pdf = PDF::loadView('reports.monthly_overtime_report', $data);
        $pdf->save('pdf/daily_present_report.pdf');
        return response()->download('pdf/monthly_overtime_report.pdf');
    }
}
