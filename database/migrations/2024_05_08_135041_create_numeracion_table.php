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
        Schema::create('numeracion', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('idtipodocumento')->constrained('tipodocumento');
            $table->integer('idempresa')->constrained('empresa');
            $table->string('prefijo',8)->notNullable();
            $table->integer('consecutivoinicial')->notNullable();
            $table->integer('consecutivofinal')->notNullable();
            $table->date('vigenciainicial')->notNullable();
            $table->date('vigenciafinal')->notNullable();
            $table->timestamps();

             $table->foreign('idtipodocumento')
                   ->references('id')
                   ->on('tipodocumento');

             $table->foreign('idempresa')
                   ->references('id')
                   ->on('empresa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('numeracion');
    }
};
