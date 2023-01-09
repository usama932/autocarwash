<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description','vehicle_id','price', 'washing_plan_1', 'washing_plan_2', 'washing_plan_3','washing_plan_4'
    ];
    public function booking()
    {
        return $this->hasMany(Bookings::class,'service_id', 'id');
    }
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class,'service_id');
    }
}
