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
        Schema::create('donadors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_donador',200)->nullanble(false);
            $table->string('organizacion',200)->nullable(true);
            $table->string('telefono_donador',50)->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donadors');
    }
};
