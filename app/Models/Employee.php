<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_name',
        'employee_id_card',
        'employee_punch_card',
        'mobile',
        'employee_status',
        'department_id',
        'designation_id',
        'schedule_id',
        'status',
    ];
}
