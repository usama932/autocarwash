<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('user');
            $table->string('vehicle_type')->nullable();
            $table->string('vehicle_no')->nullable();
            $table->string('appointment_date')->nullable();
            $table->string('time_frame')->nullable();
            $table->string('approx_hour')->nullable();
            $table->string('booked_by')->nullable();
            $table->string('status')->nullable();
            $table->string('remarks')->nullable();
            $table->string('service_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
