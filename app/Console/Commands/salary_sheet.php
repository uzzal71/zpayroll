<?php

namespace App\Console\Commands;

use App\Models\CronJob;
use App\Models\Employee;
use App\Models\SalaryInformation;
use App\Models\SalarySheet;
use App\Models\AttendanceSummary;
use Illuminate\Console\Command;

class salary_sheet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'salary_sheet:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $cronjobs = CronJob::where('status', 'on')->get();
            if ($cronjobs) { // Checking cronjobs exists start
                foreach ($cronjobs as $key => $row) { // Cronjobs foreach start
                    $month = date("m", strtotime($row->cron_job_month));
                    $year = $row->cron_job_year;

                    $employees = Employee::with(['department', 'designation', 'schedule'])->where('status', 'active')->get();

                    foreach ($employees as $key => $employee) { // Employees foreach loop start
                        $start_date = "01-".$month."-".$year;
                        $start_time = strtotime($start_date);
                        $end_time = strtotime("+1 month", $start_time);

                        // Employee salary information
                        $salary_info = SalaryInformation::where('employee_id', $employee->id)->first();

                        echo $employee->employee_name;

                        $salary_exists = SalarySheet::where([
                            'employee_id' => $employee->id,
                            'salary_month' => $month,
                            'salary_year' => $year
                        ])->first();

                        if ($salary_sheet_exists) { // Exists checking start

                            $salary_exists->employee_id = $employee->id;
                            $salary_exists->salary_month = $month;
                            $salary_exists->salary_year = $year;
                            $salary_exists->employee_name = $employee->employee_name;
                            $salary_exists->designation = $employee->designation->designation_name;
                            $salary_exists->department = $employee->department->department_name;
                            $salary_exists->joining_date = $employee->joining_date;
                            $salary_exists->gross_salary = $salary_info->gross_salary;
                            $salary_exists->basic_salary = $salary_info->basic_salary;
                            $salary_exists->house_rent = $salary_info->house_rent;
                            $salary_exists->medical_allowance = $salary_info->medical_allowance;
                            $salary_exists->transport_allowance = $salary_info->transport_allowance;
                            $salary_exists->food_allowance = $salary_info->food_allowance;
                            $salary_exists->number_of_days = 0;
                            $salary_exists->weekend = 0;
                            $salary_exists->holiday = 0;
                            $salary_exists->need_to_work = 0;
                            $salary_exists->present = 0;
                            $salary_exists->late = 0;
                            $salary_exists->absent = 0;
                            $salary_exists->unpaid_leave = 0;
                            $salary_exists->paid_leave = 0;
                            $salary_exists->need_to_pay = 0;
                            $salary_exists->late_deduction = 0;
                            $salary_exists->absent_deduction = 0;
                            $salary_exists->tax_deduction = 0;
                            $salary_exists->provident_found_deduction = 0;
                            $salary_exists->total_deduction = 0;
                            $salary_exists->commission_addition = 0;
                            $salary_exists->transport_bill_addition = 0;
                            $salary_exists->paid_leave_addition = 0;
                            $salary_exists->overtime_addition = 0;
                            $salary_exists->other_addition = 0;
                            $salary_exists->total_addition = 0;
                            $salary_exists->net_salary = 0;

                            $salary_exists->save();

                        } else {
                            $salary_sheet = new SalarySheet;

                            $salary_sheet->employee_id = $employee->id;
                            $salary_sheet->salary_month = $month;
                            $salary_sheet->salary_year = $year;
                            $salary_sheet->employee_name = $employee->employee_name;
                            $salary_sheet->designation = $employee->designation->designation_name;
                            $salary_sheet->department = $employee->department->department_name;
                            $salary_sheet->joining_date = $employee->joining_date;
                            $salary_sheet->gross_salary = $salary_info->gross_salary;
                            $salary_sheet->basic_salary = $salary_info->basic_salary;
                            $salary_sheet->house_rent = $salary_info->house_rent;
                            $salary_sheet->medical_allowance = $salary_info->medical_allowance;
                            $salary_sheet->transport_allowance = $salary_info->transport_allowance;
                            $salary_sheet->food_allowance = $salary_info->food_allowance;
                            $salary_sheet->number_of_days = 0;
                            $salary_sheet->weekend = 0;
                            $salary_sheet->holiday = 0;
                            $salary_sheet->need_to_work = 0;
                            $salary_sheet->present = 0;
                            $salary_sheet->late = 0;
                            $salary_sheet->absent = 0;
                            $salary_sheet->unpaid_leave = 0;
                            $salary_sheet->paid_leave = 0;
                            $salary_sheet->need_to_pay = 0;
                            $salary_sheet->late_deduction = 0;
                            $salary_sheet->absent_deduction = 0;
                            $salary_sheet->tax_deduction = 0;
                            $salary_sheet->provident_found_deduction = 0;
                            $salary_sheet->total_deduction = 0;
                            $salary_sheet->commission_addition = 0;
                            $salary_sheet->transport_bill_addition = 0;
                            $salary_sheet->paid_leave_addition = 0;
                            $salary_sheet->overtime_addition = 0;
                            $salary_sheet->other_addition = 0;
                            $salary_sheet->total_addition = 0;
                            $salary_sheet->net_salary = 0;

                            $salary_sheet->save();
                        } // Existing checking end

                        
                    } // Employees foreach loop end
                } // Cronjobs foreach loop end
            } // Checking cronjobs exists end
        } /* Try End */ catch (\Exception $e) {

            return $e->getMessage();
        } // Catch end
    }
}
