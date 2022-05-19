<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
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
        $direction = 'rtl';
        $text_align = 'right';
        $not_text_align = 'left';
        $font_family = "";

        $from_date = $request->from_date;
        $employee_id = $request->employee_id;
        $results = Attendance::where('attendance_date', $from_date)->whereIn('employee_id', $employee_id)->get();

        $data = [
            "company" => Company::where('id', 1)->first(),
            'results' => $results
        ];

        $path = public_path('pdf/');
        $fileName = 'daily_present_report.pdf';

        $pdf = PDF::loadView('reports.daily_present_report', $data);
        $pdf->save('pdf/daily_present_report.pdf');

        $pdf = public_path('pdf/'.$fileName);
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
    public function daily_late(Request $request)
    {
    	return view('hr_reports.daily_late');
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
    public function daily_overtime(Request $request)
    {
    	return view('hr_reports.daily_overtime');
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
    public function monthly_attendance(Request $request)
    {
    	return view('hr_reports.monthly_attendance');
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
}
