<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'model',
        
    ];
    public function service()
    {
        return $this->hasMany(Service::class,'vehicle_id', 'id');
    }
    public function booking()
    {
        return $this->hasMany(Bookings::class,'vehicle_id', 'id');
    }
}
