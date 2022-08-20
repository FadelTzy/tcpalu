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
        Schema::create('kuesioner_ps', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->tinyInteger('kp1')->nullable();
            $table->tinyInteger('kp2')->nullable();
            $table->tinyInteger('kp3')->nullable();
            $table->tinyInteger('kp4')->nullable();
            $table->tinyInteger('kp5')->nullable();
            $table->tinyInteger('kp6')->nullable();
            $table->tinyInteger('kp7')->nullable();
            $table->tinyInteger('kp8')->nullable();
            $table->tinyInteger('kp9')->nullable();
            $table->tinyInteger('kp10')->nullable();
            $table->tinyInteger('kp11')->nullable();
            $table->tinyInteger('kp12')->nullable();
            $table->tinyInteger('kp13')->nullable();
            $table->tinyInteger('kp14')->nullable();
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
        Schema::dropIfExists('kuesioner_ps');
    }
};
