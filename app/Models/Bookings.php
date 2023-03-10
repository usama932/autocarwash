<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'vehicle_type', 'vehicle_no', 'appointment_date', 'time_frame', 'approx_hour','user', 'booked_by', 'status', 'remarks',
        'service_id','service','approx_hour','discount','is_review','total_price','dis_price','polish','service_id'
    ];

}
