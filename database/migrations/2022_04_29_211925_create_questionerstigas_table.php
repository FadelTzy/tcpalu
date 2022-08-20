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
        Schema::create('questionerstigas', function (Blueprint $table) {
            $table->id();
            //step5
            $table->string('id_questioners');
            $table->tinyInteger('f21')->nullable();
            $table->tinyInteger('f22')->nullable();
            $table->tinyInteger('f23')->nullable();
            $table->tinyInteger('f24')->nullable();
            $table->tinyInteger('f25')->nullable();
            $table->tinyInteger('f26')->nullable();
            $table->tinyInteger('f27')->nullable();
            $table->tinyInteger('f301')->nullable();
            $table->tinyInteger('f302')->nullable();
            $table->integer('f303')->nullable();
            $table->tinyInteger('f401')->nullable();
            $table->tinyInteger('f1402')->nullable();
            $table->tinyInteger('f403')->nullable();
            $table->tinyInteger('f404')->nullable();
            $table->tinyInteger('f405')->nullable();
            $table->tinyInteger('f406')->nullable();
            $table->tinyInteger('f407')->nullable();
            $table->tinyInteger('f408')->nullable();
            $table->tinyInteger('f409')->nullable();
            $table->tinyInteger('f410')->nullable();
            $table->tinyInteger('f411')->nullable();
            $table->tinyInteger('f412')->nullable();
            $table->tinyInteger('f413')->nullable();
            $table->tinyInteger('f414')->nullable();
            $table->tinyInteger('f415')->nullable();
            $table->string('f416')->nullable();
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
        Schema::dropIfExists('questionerstigas');
    }
};
