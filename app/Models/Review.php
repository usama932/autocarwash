<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'user',
        'value1',
        'value2',
        'value3', 'value4', 'value5', 'remarks', 'service'
    ];
}
