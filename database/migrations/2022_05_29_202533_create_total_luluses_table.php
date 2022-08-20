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
        Schema::create('total_luluses', function (Blueprint $table) {
            $table->id();
            $table->string('kd_univ')->nullable();
            $table->string('kd_fak')->nullable();
            $table->string('kode_prodi')->nullable();
            $table->string('tahun_tl')->nullable();
            $table->string('total_tl')->nullable();
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
        Schema::dropIfExists('total_luluses');
    }
};
