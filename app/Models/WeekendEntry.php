<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeekendEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'weekend_date',
        'remarks',
        'weekend_month',
        'weekend_year',
        'status'
    ];
}
