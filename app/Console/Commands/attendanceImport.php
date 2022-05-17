<?php

namespace App\Console\Commands;

use App\Models\Attendance;
use App\Models\AttendanceLog;
use App\Models\CronJob;
use App\Models\Employee;
use App\Models\EmployeeLeaveDetail;
use App\Models\Leave;
use App\Models\OfficeHolidayDetail;
use App\Models\Schedule;
use Illuminate\Console\Command;

class attendanceImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attendance:name';

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
            if ($cronjobs) {
                foreach ($cronjobs as $key => $row) {
                    $month = date("m", strtotime($row->cron_job_month));
                    $year = $row->cron_job_year;

                    $employees = Employee::where('status', 'active')->get();

                    foreach ($employees as $key => $employee) {

                        $start_date = "01-".$month."-".$year;
                        $start_time = strtotime($start_date);
                        $end_time = strtotime("+1 month", $start_time);

                        $dates = array();

                        for($i=$start_time; $i<$end_time; $i+=86400)
                        {
                            $dates[] = date('Y-m-d', $i);
                        }

                        foreach ($dates as $value) {


                            $status = 'P';
                            $remarks = '';

                            $leave_info = EmployeeLeaveDetail::where([
                                'employee_id' => $employee->id,
                                'leave_date' => $value
                            ])->first();


                            $holiday_info = OfficeHolidayDetail::where([
                                'holiday_date' => $value
                            ])->first();

                            $timestamp = strtotime($value);
                            $day_name = date('l', $timestamp);

                            if ($day_name == 'Friday') {
                                $status = 'W';
                                $remarks = 'Weekend';
                            } elseif ($leave_info) {

                                $leave = Leave::where([
                                    'id' => $leave_info->leave_id
                                ])->first();

                                $status = $leave->short_name;
                                $remarks = $leave->leave_name;

                            } elseif ($holiday_info) {
                                $status = 'H';
                                $remarks = $holiday_info->remarks;
                            }

                            // Get Employee Shift Schedule
                            $schedule = Schedule::where('id', $employee->schedule_id)->first();

                            $exists = Attendance::where([
                                'employee_id' => $employee->id,
                                'attendance_date' => $value
                            ])->first();

                            // Check Attendance already process start
                            if (!$exists) {
                                $attendance = new Attendance;

                                $attendance_log = AttendanceLog::where([
                                    'employee_id' => $employee->employee_punch_card,
                                    'attendance_date' => $value,
                                ])->first();

                                $attendance->employee_id = $employee->id;
                                $attendance->attendance_month = $month;
                                $attendance->attendance_year = $year;
                                $attendance->attendance_date = $value;

                                if ($attendance_log) {
                                    if ($attendance_log->attendance_in) {
                                        $attendance->in_time = $attendance_log->attendance_in;
                                    } else {
                                        $attendance->in_time = '--:--';
                                    }

                                    if ($attendance_log->attendance_out) {
                                        $attendance->out_time = $attendance_log->attendance_out;
                                    } else {
                                        $attendance->out_time = '--:--';
                                    }
                                    $attendance->late_time = '--:--';
                                } else {
                                    $attendance->in_time = '--:--';
                                    $attendance->out_time = '--:--';
                                    $attendance->late_time = '--:--';
                                }

                                $attendance->over_time = 0;
                                $attendance->remarks = $remarks;
                                $attendance->attendance_status = $status;

                                $attendance->save();
                            } else {
                                $attendance = Attendance::findOrFail($exists->id);

                                $attendance_log = AttendanceLog::where([
                                    'employee_id' => $employee->employee_punch_card,
                                    'attendance_date' => $value,
                                ])->first();

                                $attendance->employee_id = $employee->id;
                                $attendance->attendance_month = $month;
                                $attendance->attendance_year = $year;
                                $attendance->attendance_date = $value;

                                if ($attendance_log) {
                                    if ($attendance_log->attendance_in) {
                                        $attendance->in_time = $attendance_log->attendance_in;
                                    } else {
                                        $attendance->in_time = '--:--';
                                    }

                                    if ($attendance_log->attendance_out) {
                                        $attendance->out_time = $attendance_log->attendance_out;
                                    } else {
                                        $attendance->out_time = '--:--';
                                    }
                                    $attendance->late_time = '--:--';
                                } else {
                                    $attendance->in_time = '--:--';
                                    $attendance->out_time = '--:--';
                                    $attendance->late_time = '--:--';
                                }

                                $attendance->over_time = 0;
                                $attendance->remarks = $remarks;
                                $attendance->attendance_status = $status;

                                $attendance->save();
                            }
                            // Check Attendance already process end
                        }
                    }
                }
            }
        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }
}
