<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaixasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faixas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('estilo');
            $table->text('descricao');
            $table->string('duracao');
            $table->string('status');
            $table->integer('user_id');
            $table->integer('album_id');
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
        Schema::dropIfExists('faixas');
    }
}
