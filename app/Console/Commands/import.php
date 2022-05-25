<?php

namespace App\Console\Commands;

use Excel;
use App\Models\CronJob;
use App\Models\Upload;
use App\Imports\AttendanceImport;
use Faker\Core\File;
use Illuminate\Console\Command;

class import extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Excel Attendance';

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
       $cronjobs = CronJob::where('status', 'on')->get();
        if ($cronjobs) { 
            foreach ($cronjobs as $key => $row) { 
                $upload = Upload::where([
                    'attendance_month' => $row->cron_job_month,
                    'attendance_year' => $row->cron_job_year]
                 )->first();

                if ($upload) {
                    $fullpath = $upload->upload_path;
                    Excel::import(new AttendanceImport, 'C:\xampp\htdocs\zpayroll\public\uploads\attendance_files\April-2022.xls');
                }
        
            }
        }
    }
}
