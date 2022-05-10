<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWeekDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'week_day_id'
    ];

    public $timestamps = false;
    protected $table = 'users_week_day';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
