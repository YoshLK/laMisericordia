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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->string('dia',20)->nullanble(false);
            $table->time('inicio')->nullanble(false);
            $table->time('final')->nullanble(false);
            $table->foreignId('personal_id')
            ->nullable()
            ->constrained('personals')
            ->cascadeOnUpdate()
            ->cascadeonDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
