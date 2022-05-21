<?php

namespace App\Console\Commands;

use Excel;
use App\Imports\AttendanceImport;
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
        Excel::import(new AttendanceImport, 'C:\xampp\htdocs\zpayroll\public\uploads\attendance_files\April-2022.xls');
    }
}
