<?php

namespace App\Imports;

use App\Models\AttendanceLog;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class AttendanceImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $exists = AttendanceLog::where([
                'employee_id' => $row[0],
                'attendance_date' => date('Y-m-d', strtotime($row[1])),
            ])->first();

            if ($exists) {
                AttendanceLog::where('employee_id', $row[0])
                  ->where('attendance_date', date('Y-m-d', strtotime($row[1])))
                  ->update([
                    'employee_id'     => $row[0],
                    'attendance_date'    => date('Y-m-d', strtotime($row[1])), 
                    'attendance_in' => $row[2],
                    'attendance_out' => $row[3],
                ]);

            } else {
                AttendanceLog::create([
                    'employee_id'     => $row[0],
                    'attendance_date'    => date('Y-m-d', strtotime($row[1])), 
                    'attendance_in' => $row[2],
                    'attendance_out' => $row[3],
                ]);
            }
        }
    }
}
