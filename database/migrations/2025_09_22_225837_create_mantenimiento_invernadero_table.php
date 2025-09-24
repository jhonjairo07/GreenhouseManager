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
        Schema::create('mantenimiento_invernadero', function (Blueprint $table) {
            $table->id();
            $table->date('fechaMantenimiento');
            $table->decimal('costoMantenimiento', 10, 2);
            $table->text('descripcion');
            $table->timestamps();

            $table->foreignId('invernadero_id')->constrained('invernaderos')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimiento_invernadero');
    }
};
