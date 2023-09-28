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
        Schema::create('historials', function (Blueprint $table) {
            $table->id();
            $table->double('peso')->nullanble(false);
            $table->double('altura')->nullanble(false);
            $table->string('tronco',5)->nullanble(false);
            $table->integer('piernas')->nullanble(false);
            $table->integer('calzado')->nullanble(false);
            $table->string('dificultad_motora',150)->nullable(true);
            $table->unsignedBigInteger('adulto_id')->unique();
            $table->foreign('adulto_id')
                  ->references('id')->on('adultos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historials');
    }
};
