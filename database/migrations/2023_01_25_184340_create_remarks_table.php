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
        Schema::create('remarks', function (Blueprint $table) {
            $table->id();
            $table->string('remarks')->nullable();
            $table->integer('attendance_id')->unsigned();
            $table->foreign('attendance_id')->references('id')->on('attendances')->onDelete('cascade');
            $table->string('attendance_date')->nullable();
            $table->integer('emp_id')->nullable();
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
       
        Schema::table('remarks', function (Blueprint $table) {
            $table->dropColumn('attendance_date');
        });
    }
};
