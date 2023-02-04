<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $fillable = [
        'name', 'description','vehicle_id','price','vehicle','is_popular','is_push','discount','category'
    ];
    // public function booking()
    // {
    //     return $this->hasMany(Bookings::class,'service_id', 'id');
    // }
    // public function vehicle()
    // {
    //     return $this->belongsTo(related: Vehicle::class);
    // }
}
