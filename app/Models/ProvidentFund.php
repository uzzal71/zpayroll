<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvidentFund extends Model
{
    use HasFactory;

    protected $fillable = [
        'provident_found_name',
        'percentage',
        'status',
    ];
}
