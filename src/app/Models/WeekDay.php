<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeekDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'week_day'
    ];

    protected $table = 'week_day';

    public $timestamps = false;
}
