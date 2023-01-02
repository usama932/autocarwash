<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'sex', 'dob', 'mobile', 'address', 'join_date', 'status', 'post',
    ];
}
