<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remarks extends Model
{
    use HasFactory;
    protected $fillable = [
        'remarks',
        'attendance_id',
        
    ];
    public function attd()
    {
        return $this->belongsTo('App\Model\Attendence');
    }
}
