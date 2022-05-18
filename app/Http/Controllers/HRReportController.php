<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
