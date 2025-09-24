<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Type\Decimal;   

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invernaderos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->decimal('tamano', 10, 2)->nullable(); // o ->default(0)
            $table->decimal('costoConstruccion', 10, 2);
            $table->decimal('rendimiento', 20, 2);
            $table->timestamps();

            $table->foreignId('finca_id')->constrained('fincas')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invernaderos');
    }
};
