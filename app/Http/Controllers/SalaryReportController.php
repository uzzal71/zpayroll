<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalaryReportController extends Controller
{
	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function salary_sheet(Request $request)
    {
    	return view('salary_reports.monthly_salary_sheet');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function monthly_payslip(Request $request)
    {
    	return view('salary_reports.monthly_payslip');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tax_report(Request $request)
    {
    	return view('salary_reports.monthly_tax');
    }
}
