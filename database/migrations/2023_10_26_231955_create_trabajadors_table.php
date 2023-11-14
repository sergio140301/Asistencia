<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trabajadors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidoP');
            $table->string('apellidoM');
            $table->string('rfc');
            $table->date('fechaIngreso');
            $table->string('escolaridad');
            $table->string('foto');
            $table->foreignId('departamento_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('puesto_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajadors');
    }
};
