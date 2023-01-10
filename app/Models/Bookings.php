<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'vehicle_type', 'vehicle_no', 'appointment_date', 'time_frame', 'approx_hour','user', 'booked_by', 'status', 'remarks',
        'service_id','service'
    ];
    // public function service()
    // {
    //     return $this->belongsTo(Service::class,'service_id');
    // }
    // public function user()
    // {
    //     return $this->belongsTo(User::class,'user_id');
    // }
    // public function vehicle()
    // {
    //     return $this->belongsTo(Vehicle::class,'vehicle_id');
    }
}
