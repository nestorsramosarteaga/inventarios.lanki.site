<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('tipo_ua', 20);
            $table->string('marca', 20);
            $table->string('procesador', 20);
            $table->unsignedBigInteger('client_id');
            $table->smallInteger('generacion');
            $table->timestamps();
            
            $table->foreign('client_id')->references('id')->on('clients');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
