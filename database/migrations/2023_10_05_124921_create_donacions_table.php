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
        Schema::create('donacions', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_donacion',100)->nullanble(false);
            $table->string('cantidad',200)->nullanble(false);
            $table->string('descripcion',200)->nullable(true);
            $table->foreignId('donador_id')
                  ->nullable()
                  ->constrained('donadors')
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
        Schema::dropIfExists('donacions');
    }
};
