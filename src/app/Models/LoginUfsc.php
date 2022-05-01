<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginUfsc extends Model
{
    use HasFactory;

    protected $table = 'login_ufsc';

    protected $fillable = [
        'user_id',
        'enrollment',
        'password',
    ];
}
