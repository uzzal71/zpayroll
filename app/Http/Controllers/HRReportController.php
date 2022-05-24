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
            
        $company = Company::orderBy('id', 'desc')->first();

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

        $company = Company::orderBy('id', 'desc')->first();

        $data = [
            "company" => $company,
            'results' => $results
        ];

        $pdf = PDF::loadView('reports.daily_absent_report', $data);
        $pdf->save('pdf/daily_absent_report.pdf');
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

        $company = Company::orderBy('id', 'desc')->first();

        $data = [
            "company" => $company,
            'results' => $results
        ];

        $pdf = PDF::loadView('reports.daily_late_report', $data);
        $pdf->save('pdf/daily_late_report.pdf');
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
            ->whereIn('attendance_status', ['SL','AL','CL','MAT','ML','PAT'])
            ->whereIn('employee_id', $employee_id)
            ->get();

        $company = Company::orderBy('id', 'desc')->first();

        $data = [
            "company" => $company,
            'results' => $results
        ];

        $pdf = PDF::loadView('reports.daily_leave_report', $data);
        $pdf->save('pdf/daily_leave_report.pdf');
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
            ->where('over_time', '!=', 0)
            ->whereIn('employee_id', $employee_id)
            ->get();

        $company = Company::orderBy('id', 'desc')->first();

        $data = [
            "company" => $company,
            'results' => $results
        ];

        $pdf = PDF::loadView('reports.daily_overtime_report', $data);
        $pdf->save('pdf/daily_overtime_report.pdf');
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
        $to_date = $request->to_date;
        $employee_id = $request->employee_id;
        $employees = Employee::with(['department', 'designation', 'schedule'])->whereIn('id', $employee_id)->get();

        $company = Company::orderBy('id', 'desc')->first();

        $output = '';
        $emp_length = count($employees);

        foreach ($employees as $key => $employee) { 
            $emp_length = $emp_length - 1;

            $results = Attendance::whereBetween('attendance_date', [$from_date, $to_date])
                ->where('employee_id', $employee->id)
                ->get();

            $output .= '<div style="padding: 2rem;">
                <h2 class="text-center p-0 m-0">'.$company->company_full_name.'</h2>
                <p class="text-center">'.$company->address.'</p>
                <h3 class="text-center">'.$from_date.' To '.$to_date.' Attendance Sheet</h3>
                <div>
                    <table class="padding text-left small">
                        <tr>
                            <td width="20%">Name: </td>
                            <td width="30%">'.$employee->employee_name.'</td>
                            <td width="20%">Department: </td>
                            <td width="30%">'.$employee->department->department_name.'</td>
                        </tr>
                        <tr>
                            <td width="20%">Card: </td>
                            <td width="30%">'.$employee->employee_punch_card.'</td>
                            <td width="20%">Designation: </td>
                            <td width="30%">'.$employee->designation->designation_name.'</td>
                        </tr>
                    </table>
                </div>
                <table class="padding text-left small border-bottom">
                    <thead>
                        <tr class="gry-color" style="background: #eceff4;">
                            <th width="15%" class="text-left">Date</th>
                            <th width="10%" class="text-left">In-Time</th>
                            <th width="10%" class="text-left">Out-Time</th>
                            <th width="10%" class="text-left">Late-Time</th>
                            <th width="10%" class="text-left">Status</th>
                            <th width="15%" class="text-left">Remarks</th>
                        </tr>
                    </thead>';

            $output .= '<tbody class="strong">';

            foreach ($results as $key1 => $row) {  
                $output .= '<tr>';
                    $output .= '<td>'.$row->attendance_date.'</td>';
                    $output .= '<td>'.$row->in_time.'</td>';
                    $output .= '<td>'.$row->out_time.'</td>';
                    $output .= '<td>'.$row->late_time.'</td>';
                    $output .= '<td>'.$row->attendance_status.'</td>';
                    $output .= '<td>'.$row->remarks.'</td>';
                $output .= '</tr>';
            }

            $output .= '</tbody>
                </table>
                <div>
                    <table class="padding text-left small">
                        <tr>
                            <td width="50%">
                                <table>
                                    <tr>
                                        <td width="50%">P = Present</td>
                                        <td width="50%">A = Absent</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">L = Late</td>
                                        <td width="50%">W = Weekend</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">H = Holiday</td>
                                        <td width="50%">SL, ML = Leave</td>
                                    </tr>
                                </table>
                            </td>
                            <td width="50%">
                                <table>
                                    <tr>
                                        <td width="50%">Present = </td>
                                        <td width="50%">Absent = </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Late = </td>
                                        <td width="50%">Weekend = </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Holiday = </td>
                                        <td width="50%">Leave = </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>';

            if ($emp_length != 0) {
                $output .= '<pagebreak></pagebreak>';
            }
        }

        $pdf = PDF::loadView('reports.monthly_attendance_report', ['output' => $output]);
        $pdf->save('pdf/monthly_attendance_report.pdf');
        return response()->download('pdf/monthly_attendance_report.pdf');
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
        $month = $request->month;
        $year = $request->year;
        $employee_id = $request->employee_id;
        $employees = Employee::with(['department', 'designation', 'schedule'])->whereIn('id', $employee_id)->get();

        $company = Company::orderBy('id', 'desc')->first();

        $output = '';
        $month_name = date("F", mktime(0, 0, 0, $month, 10));
        $emp_length = count($employees);

        foreach ($employees as $key => $employee) { 
            $emp_length = $emp_length - 1;

            $results = Attendance::where('attendance_month', $month)
                ->where('attendance_year', $year)
                ->where('employee_id', $employee->id)
                ->get();

            $output .= '<div style="padding: 2rem;">
                <h2 class="text-center p-0 m-0">'.$company->company_full_name.'</h2>
                <p class="text-center">'.$company->address.'</p>
                <h3 class="text-center">'.$month_name.' - '.$year.' Attendance Sheet</h3>
                <div>
                    <table class="padding text-left small">
                        <tr>
                            <td width="20%">Name: </td>
                            <td width="30%">'.$employee->employee_name.'</td>
                            <td width="20%">Department: </td>
                            <td width="30%">'.$employee->department->department_name.'</td>
                        </tr>
                        <tr>
                            <td width="20%">Card: </td>
                            <td width="30%">'.$employee->employee_punch_card.'</td>
                            <td width="20%">Designation: </td>
                            <td width="30%">'.$employee->designation->designation_name.'</td>
                        </tr>
                    </table>
                </div>
                <table class="padding text-left small border-bottom">
                    <thead>
                        <tr class="gry-color" style="background: #eceff4;">
                            <th width="15%" class="text-left">Date</th>
                            <th width="10%" class="text-left">In-Time</th>
                            <th width="10%" class="text-left">Out-Time</th>
                            <th width="10%" class="text-left">Late-Time</th>
                            <th width="10%" class="text-left">Status</th>
                            <th width="15%" class="text-left">Remarks</th>
                        </tr>
                    </thead>';

            $output .= '<tbody class="strong">';

            foreach ($results as $key1 => $row) {  
                $output .= '<tr>';
                    $output .= '<td>'.$row->attendance_date.'</td>';
                    $output .= '<td>'.$row->in_time.'</td>';
                    $output .= '<td>'.$row->out_time.'</td>';
                    $output .= '<td>'.$row->late_time.'</td>';
                    $output .= '<td>'.$row->attendance_status.'</td>';
                    $output .= '<td>'.$row->remarks.'</td>';
                $output .= '</tr>';
            }

            $output .= '</tbody>
                </table>
                <div>
                    <table class="padding text-left small">
                        <tr>
                            <td width="50%">
                                <table>
                                    <tr>
                                        <td width="50%">P = Present</td>
                                        <td width="50%">A = Absent</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">L = Late</td>
                                        <td width="50%">W = Weekend</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">H = Holiday</td>
                                        <td width="50%">SL, ML = Leave</td>
                                    </tr>
                                </table>
                            </td>
                            <td width="50%">
                                <table>
                                    <tr>
                                        <td width="50%">Present = </td>
                                        <td width="50%">Absent = </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Late = </td>
                                        <td width="50%">Weekend = </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Holiday = </td>
                                        <td width="50%">Leave = </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>';

            if ($emp_length != 0) {
                $output .= '<pagebreak></pagebreak>';
            }
        }

        $pdf = PDF::loadView('reports.monthly_attendance_report', ['output' => $output]);
        $pdf->save('pdf/monthly_attendance_report.pdf');
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

        $company = Company::orderBy('id', 'desc')->first();

        $data = [
            "company" => $company,
            'results' => $results
        ];

        $pdf = PDF::loadView('reports.monthly_overtime_report', $data);
        $pdf->save('pdf/daily_present_report.pdf');
        return response()->download('pdf/monthly_overtime_report.pdf');
    }
}
