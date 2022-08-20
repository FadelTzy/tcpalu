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
        Schema::create('questionersatus', function (Blueprint $table) {
            $table->id();
            //step2
            $table->string('id_questioners');
            $table->tinyInteger('f8')->nullable();
            $table->tinyInteger('f504')->nullable();
            $table->tinyInteger('f502')->nullable();
            $table->string('f505')->nullable();
            $table->tinyInteger('f506')->nullable();
            $table->integer('f5a1')->nullable()->unsigned();
            $table->integer('f5a2')->nullable()->unsigned();
            $table->tinyInteger('f1101')->nullable();
            $table->string('f1102')->nullable();
            $table->string('f5b')->nullable();
            $table->tinyInteger('f5c')->nullable();
            $table->tinyInteger('f5d')->nullable();
            $table->tinyInteger('f18a')->nullable();
            $table->string('f18b')->nullable();
            $table->string('f18c')->nullable();
            $table->date('f18d')->nullable();
            $table->tinyInteger('f1201')->nullable();
            $table->string('f1202')->nullable();
            $table->tinyInteger('f14')->nullable();
            $table->tinyInteger('f15')->nullable();
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
        Schema::dropIfExists('questionersatus');
    }
};
