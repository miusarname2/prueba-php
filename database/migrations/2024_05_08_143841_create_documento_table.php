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
        Schema::create('documento', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('idnumeracion')->constrained('numeracion')->notNullable();
            $table->integer('idestado')->constrained('estado')->notNullable();
            $table->integer('numero')->notNullable();
            $table->date('fecha')->notNullable();
            $table->decimal('base',8,2)->notNullable();
            $table->decimal('impuestos',8,2)->notNullable();
            $table->timestamps();

            $table->foreign('idnumeracion')
                   ->references('id')
                   ->on('numeracion');

             $table->foreign('idestado')
                   ->references('id')
                   ->on('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documento');
    }
};
