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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->char('sex')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('dob')->nullable();
            $table->string('post')->nullable();
            $table->text('address')->nullable();
            $table->string('status')->nullable();
            $table->string('join_date')->nullable();
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
        Schema::dropIfExists('teams');
    }
};
