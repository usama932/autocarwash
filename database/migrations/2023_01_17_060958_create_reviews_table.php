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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('user')->nullable();
            $table->boolean('value1')->default(0)->nullable();   
            $table->boolean('value2')->default(0)->nullable();   
            $table->boolean('value3')->default(0)->nullable();   
            $table->boolean('value4')->default(0)->nullable();   
            $table->boolean('value5')->default(0)->nullable();   
            $table->boolean('is_feature')->default(0)->nullable();   
            $table->string('remarks')->nullable();
            $table->string('service')->nullable();
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
        Schema::dropIfExists('reviews');
    }
};
