<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipamento', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('marca');
            $table->string('modelo');
            $table->text('observacao')->nullable();

            $table->unsignedBigInteger('usuario');
            $table->foreign('usuario')->references('id')->on('users');
            
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
        Schema::dropIfExists('equipamento');
    }
}
