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
        Schema::create('questionersempats', function (Blueprint $table) {
            $table->id();
            $table->string('id_questioners');
            $table->integer('f6')->nullable();
            $table->tinyInteger('f7')->nullable();
            $table->tinyInteger('f7a')->nullable();
            $table->tinyInteger('f1001')->nullable();
            $table->string('f1002')->nullable();
            $table->tinyInteger('f1601')->nullable();
            $table->tinyInteger('f1602')->nullable();
            $table->tinyInteger('f1603')->nullable();
            $table->tinyInteger('f1604')->nullable();
            $table->tinyInteger('f1605')->nullable();
            $table->tinyInteger('f1606')->nullable();
            $table->tinyInteger('f1607')->nullable();
            $table->tinyInteger('f1608')->nullable();
            $table->tinyInteger('f1609')->nullable();
            $table->tinyInteger('f1610')->nullable();
            $table->tinyInteger('f1611')->nullable();
            $table->tinyInteger('f1612')->nullable();
            $table->tinyInteger('f1613')->nullable();
            $table->string('f1614')->nullable();
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
        Schema::dropIfExists('questionersempats');
    }
};
