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
        Schema::create('questionersduas', function (Blueprint $table) {
            $table->id();
            //step34
            $table->string('id_questioners');
            $table->tinyInteger('f1761')->nullable();
            $table->tinyInteger('f1762')->nullable();
            $table->tinyInteger('f1763')->nullable();
            $table->tinyInteger('f1764')->nullable();
            $table->tinyInteger('f1765')->nullable();
            $table->tinyInteger('f1766')->nullable();
            $table->tinyInteger('f1767')->nullable();
            $table->tinyInteger('f1768')->nullable();
            $table->tinyInteger('f1769')->nullable();
            $table->tinyInteger('f1770')->nullable();
            $table->tinyInteger('f1771')->nullable();
            $table->tinyInteger('f1772')->nullable();
            $table->tinyInteger('f1773')->nullable();
            $table->tinyInteger('f1774')->nullable();
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
        Schema::dropIfExists('questionersduas');
    }
};
