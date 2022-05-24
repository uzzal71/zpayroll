<?php

namespace App\Console\Commands;

use Excel;
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
        $files =  'http://127.0.0.1:8000/public/uploads/attendance_files/April-2022.xls';

        if (file_exists ($files)) {
            echo $files;
        } else {
            echo "NO";
        }
       Excel::import(new AttendanceImport, $files);
    }
}
