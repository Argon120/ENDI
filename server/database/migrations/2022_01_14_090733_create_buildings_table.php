<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->text('comune')->nullable();
            $table->text('immagine')->nullable();
            $table->text('nome')->nullable();
            $table->text('indirizzo')->nullable();
            $table->integer('cap')->nullable();
            $table->text('appartamenti')->nullable();
            $table->integer('consumo_annuo')->nullable();
            $table->text('contabilizzazione')->nullable();
            $table->text('tipo_sonda')->nullable();
            $table->text('tipo_dispositivi')->nullable();
            $table->text('provincia')->nullable();
            $table->boolean('gestione remota')->nullable();
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
        Schema::dropIfExists('buildings');
    }
}
