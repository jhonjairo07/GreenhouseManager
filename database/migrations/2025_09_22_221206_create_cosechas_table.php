<?php

use App\Models\Invernadero;
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
        Schema::create('cosechas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_creacion');
            $table->date('fecha_siembra');
            $table->date('fecha_cosecha_estimada');
            $table->date('fecha_cosecha_real');
            $table->decimal('cantidad_sembrada', 10, 2);
            $table->decimal('total_gastos', 10, 2);
            $table->decimal('total_ingresos', 10, 2);
            $table->decimal('utilidad', 10, 2);
            $table->text('notas');
            $table->timestamps();


            $table->foreignId('invernadero_id')->constrained('invernaderos')->onDelete('cascade');
            $table->foreignId('cultivo_id')->constrained('tipos_cultivo')->onDelete('cascade');
            $table->foreignId('id_estado')->constrained('estados_cosecha')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cosechas');
    }
};
