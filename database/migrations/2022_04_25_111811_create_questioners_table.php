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
        Schema::create('questioners', function (Blueprint $table) {
            $table->id();
            //biodata
            $table->string('id_user')->nullable();
            $table->string('kdptimsmh')->nullable();
            $table->integer('kdpstmsmh')->nullable();
            $table->string('nimhsmsmh')->nullable();
            $table->string('nmmhsmsmh')->nullable();
            $table->string('telpomsmh')->nullable();
            $table->string('emailmsmh')->nullable();
            $table->string('tahun_lulus')->nullable();
            $table->string('nik')->nullable();
            $table->string('npwp')->nullable();
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
        Schema::dropIfExists('questioners');
    }
};
