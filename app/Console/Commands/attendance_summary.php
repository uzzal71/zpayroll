<?php

namespace App\Console\Commands;

use App\Models\CronJob;
use App\Models\Employee;
use App\Models\AttendanceSummary;
use Illuminate\Console\Command;

class attendance_summary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attendance_summary:name';

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

                    $employees = Employee::where('status', 'active')->get();

                    foreach ($employees as $key => $employee) { // Employees foreach loop start
                        $start_date = "01-".$month."-".$year;
                        $start_time = strtotime($start_date);
                        $end_time = strtotime("+1 month", $start_time);

                        echo $employee->employee_name;

                        $dates = array();

                        for($i=$start_time; $i<$end_time; $i+=86400)
                        {
                            $dates[] = trim(date('Y-m-d', $i));
                        }

                        $exists = AttendanceSummary::where([
                            'employee_id ' => $employee->id,
                            'attendance_month' => $month,
                            'attendance_year' => $year
                        ])->first();

                        if ($exists) { // Exists checking start

                        } else {

                        } // Exists checking end
                    } // Employees foreach loop end
                } // Cronjobs foreach loop end
            } // Checking cronjobs exists end

        } /* Try End */ catch (\Exception $e) {

            return $e->getMessage();
        } // Catch end
    }
}
