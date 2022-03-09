<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->bigInteger('id_banco')->unsigned();
            $table->string('id_player',10)->index();
            $table->string('image');
            $table->decimal('monto');
            $table->bigInteger('id_razon_modificacion')->unsigned()->nullable();
            $table->timestamps();
            //
            $table->foreign('id_banco')->references('id')->on('bancos')->onDelete('cascade');
            $table->foreign('id_razon_modificacion')->references('id')->on('motivos')->onDelete('cascade');
            $table->foreign('id_player')->references('codigo')->on('players')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registros');
    }
}
