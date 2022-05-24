<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayHour extends Model
{
    use HasFactory;

    protected $fillable = [
        'hour'
    ];

    protected $table = 'day_hour';

    public $timestamps = false;
}
