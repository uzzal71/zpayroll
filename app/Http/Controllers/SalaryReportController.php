<?php

namespace App\Http\Controllers;

use App\Models\SalarySheet;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;


class SalaryReportController extends Controller
{
	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function monthly_salary_details(Request $request)
    {
    	return view('salary_reports.monthly_salary_details');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function monthly_salary_details_report(Request $request)
    {
        $month = $request->month;
        $year = $request->year;
        $employee_id = $request->employee_id;
        $employees = Employee::with(['department', 'designation', 'schedule'])->whereIn('id', $employee_id)->get();

        $month_name = date("F", mktime(0, 0, 0, $month, 10));

        $output = '<div>
                <h2 class="text-center p-0 m-0">ZAMAN-IT</h2>
                <p class="text-center">House 63, Road 13, Sector 10, Uttara, Dhaka-1230</p>
                <h3 class="text-center">'.$month_name.' - '.$year.' Salary Sheet</h3>';

        $output .= '
                <table class="padding text-center small border-bottom">
                    <thead>
                        <tr class="gry-color" style="background: #eceff4;">
                            <th class="text-center" rowspan="2">SL</th>
                            <th class="text-center" rowspan="2">Employee</th>
                            <th class="text-center" rowspan="2">Designation</th>
                            <th class="text-center" rowspan="2">Gross Salary</th>
                            <th class="text-center" colspan="9">Attendance</th>
                            <th class="red-color text-center" colspan="4">Deduction</th>
                            <th class="text-center" colspan="6">Addition</th>
                            <th class="text-center" rowspan="2">Neet Salary</th>
                        </tr>
                        <tr class="gry-color" style="background: #eceff4;">
                            <th class="text-center">Total Days</th>
                            <th class="text-center">W</th>
                            <th class="text-center">H</th>
                            <th class="text-center">P</th>
                            <th class="text-center">L</th>
                            <th class="text-center">A</th>
                            <th class="text-center">UP</th>
                            <th class="text-center">PL</th>
                            <th class="text-center">Need Pay</th>
                            <th class="text-center">LD</th>
                            <th class="text-center">AD</th>
                            <th class="text-center">ASD</th>
                            <th class="text-center">TLD</th>
                            <th class="text-center">COA</th>
                            <th class="text-center">TB</th>
                            <th class="text-center">PLA</th>
                            <th class="text-center">OTT</th>
                            <th class="text-center">Bonus</th>
                            <th class="text-center">TLD</th>
                        </tr>
                    </thead><tbody class="strong">';

        foreach ($employees as $key => $employee) { 

            $row = SalarySheet::where('salary_month', $month)
                ->where('salary_year', $year)
                ->where('employee_id', $employee->id)
                ->first();
            
                $output .= '<tr>';
                    $output .= '<td>'.$row->employee_id.'</td>';
                    $output .= '<td>'.$row->employee_name.'</td>';
                    $output .= '<td>'.$row->designation.'</td>';
                    $output .= '<td>'.$row->gross_salary.'</td>';
                    $output .= '<td>'.$row->number_of_days.'</td>';
                    $output .= '<td>'.$row->weekend.'</td>';
                    $output .= '<td>'.$row->holiday.'</td>';
                    $output .= '<td>'.$row->present.'</td>';
                    $output .= '<td>'.$row->late.'</td>';
                    $output .= '<td>'.$row->absent.'</td>';
                    $output .= '<td>'.$row->unpaid_leave.'</td>';
                    $output .= '<td>'.$row->paid_leave.'</td>';
                    $output .= '<td>'.$row->need_to_pay.'</td>';
                    $output .= '<td>'.$row->late_deduction.'</td>';
                    $output .= '<td>'.$row->absent_deduction.'</td>';
                    $output .= '<td>'.$row->advance_salary_deduction.'</td>';
                    $output .= '<td>'.$row->total_deduction.'</td>';
                    $output .= '<td>'.$row->commission_addition.'</td>';
                    $output .= '<td>'.$row->transport_bill_addition.'</td>';
                    $output .= '<td>'.$row->paid_leave_addition.'</td>';
                    $output .= '<td>'.$row->overtime_addition.'</td>';
                    $output .= '<td>'.$row->festival_bonus_addition.'</td>';
                    $output .= '<td>'.$row->total_addition.'</td>';
                    $output .= '<td>'.$row->net_salary.'</td>';
                $output .= '</tr>';          
        }

        $output .= '</tbody>
                </table>
                <div>'; 

        $pdf = PDF::loadView('reports.monthly_salary_details_report', ['output' => $output], [], ['orientation' => 'L', 'format' => 'A5-L']);
        $pdf->save('pdf/monthly_salary_details_report.pdf');
        return response()->download('pdf/monthly_salary_details_report.pdf');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function monthly_salary_sheet(Request $request)
    {
        return view('salary_reports.monthly_salary_sheet');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function monthly_salary_sheet_report(Request $request)
    {
        $month = $request->month;
        $year = $request->year;
        $employee_id = $request->employee_id;
        $employees = Employee::with(['department', 'designation', 'schedule'])->whereIn('id', $employee_id)->get();

        $month_name = date("F", mktime(0, 0, 0, $month, 10));

        $output = '<div>
                <h2 class="text-center p-0 m-0">ZAMAN-IT</h2>
                <p class="text-center">House 63, Road 13, Sector 10, Uttara, Dhaka-1230</p>
                <h3 class="text-center">'.$month_name.' - '.$year.' Salary Sheet</h3>';

        $output .= '
                <table class="padding text-center small border-bottom">
                    <thead>
                        <tr class="gry-color" style="background: #eceff4;">
                            <th class="text-center" rowspan="2">SL</th>
                            <th class="text-center" rowspan="2">Employee</th>
                            <th class="text-center" rowspan="2">Designation</th>
                            <th class="text-center" rowspan="2">Department</th>
                            <th class="text-center" rowspan="2">Joining Date</th>
                            <th class="text-center" colspan="6">Salary Info</th>
                            <th class="text-center" colspan="9">Attendance</th>
                            <th class="red-color text-center" colspan="6">Deduction</th>
                            <th class="text-center" colspan="8">Addition</th>
                            <th class="text-center" rowspan="2">Neet Salary</th>
                        </tr>
                        <tr class="gry-color" style="background: #eceff4;">
                            <th class="text-center">Gross</th>
                            <th class="text-center">Basic</th>
                            <th class="text-center">House</th>
                            <th class="text-center">Medical</th>
                            <th class="text-center">Transport</th>
                            <th class="text-center">Food</th>
                            <th class="text-center">Total Days</th>
                            <th class="text-center">W</th>
                            <th class="text-center">H</th>
                            <th class="text-center">P</th>
                            <th class="text-center">L</th>
                            <th class="text-center">A</th>
                            <th class="text-center">UP</th>
                            <th class="text-center">PL</th>
                            <th class="text-center">Need Pay</th>
                            <th class="text-center">LD</th>
                            <th class="text-center">AD</th>
                            <th class="text-center">TX</th>
                            <th class="text-center">PFD</th>
                            <th class="text-center">OD</th>
                            <th class="text-center">TLD</th>
                            <th class="text-center">COA</th>
                            <th class="text-center">TB</th>
                            <th class="text-center">PLA</th>
                            <th class="text-center">OTT</th>
                            <th class="text-center">ASD</th>
                            <th class="text-center">OD</th>
                            <th class="text-center">Bonus</th>
                            <th class="text-center">TLD</th>
                        </tr>
                    </thead><tbody class="strong">';

        foreach ($employees as $key => $employee) { 

            $row = SalarySheet::where('salary_month', $month)
                ->where('salary_year', $year)
                ->where('employee_id', $employee->id)
                ->first();
            
                $output .= '<tr>';
                    $output .= '<td>'.$row->employee_id.'</td>';
                    $output .= '<td>'.$row->employee_name.'</td>';
                    $output .= '<td>'.$row->designation.'</td>';
                    $output .= '<td>'.$row->department.'</td>';
                    $output .= '<td>'.$row->joining_date.'</td>';
                    $output .= '<td>'.$row->gross_salary.'</td>';
                    $output .= '<td>'.$row->basic_salary.'</td>';
                    $output .= '<td>'.$row->house_allowance.'</td>';
                    $output .= '<td>'.$row->medical_allowance.'</td>';
                    $output .= '<td>'.$row->transport_allowance.'</td>';
                    $output .= '<td>'.$row->food_allowance.'</td>';
                    $output .= '<td>'.$row->number_of_days.'</td>';
                    $output .= '<td>'.$row->weekend.'</td>';
                    $output .= '<td>'.$row->holiday.'</td>';
                    $output .= '<td>'.$row->present.'</td>';
                    $output .= '<td>'.$row->late.'</td>';
                    $output .= '<td>'.$row->absent.'</td>';
                    $output .= '<td>'.$row->unpaid_leave.'</td>';
                    $output .= '<td>'.$row->paid_leave.'</td>';
                    $output .= '<td>'.$row->need_to_pay.'</td>';
                    $output .= '<td>'.$row->late_deduction.'</td>';
                    $output .= '<td>'.$row->absent_deduction.'</td>';
                    $output .= '<td>'.$row->tax_deduction.'</td>';
                    $output .= '<td>'.$row->provident_fund_deduction.'</td>';
                    $output .= '<td>'.$row->others_deduction.'</td>';
                    $output .= '<td>'.$row->total_deduction.'</td>';
                    $output .= '<td>'.$row->commission_addition.'</td>';
                    $output .= '<td>'.$row->transport_bill_addition.'</td>';
                    $output .= '<td>'.$row->paid_leave_addition.'</td>';
                    $output .= '<td>'.$row->overtime_addition.'</td>';
                    $output .= '<td>'.$row->advance_salary_addition.'</td>';
                    $output .= '<td>'.$row->others_addition.'</td>';
                    $output .= '<td>'.$row->festival_bonus_addition.'</td>';
                    $output .= '<td>'.$row->total_addition.'</td>';
                    $output .= '<td>'.$row->net_salary.'</td>';
                $output .= '</tr>';          
        }

        $output .= '</tbody>
                </table>
                <div>'; 

        $pdf = PDF::loadView('reports.monthly_salary_sheet_report', ['output' => $output], [], ['orientation' => 'L', 'format' => 'A5-L']);
        $pdf->save('pdf/monthly_salary_sheet_report.pdf');
        return response()->download('pdf/monthly_salary_sheet_report.pdf');
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
