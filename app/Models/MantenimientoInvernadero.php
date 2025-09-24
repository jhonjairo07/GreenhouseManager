<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MantenimientoInvernadero extends Model
{
    protected $table = 'mantenimiento_invernadero'; // <-- minúsculas y guion bajo

    protected $fillable = [
        'fechaMantenimiento',
        'costoMantenimiento',
        'descripcion', // <-- minúscula, igual que en la migración
        'invernadero_id', // <-- igual que en la migración
    ];

    public function invernadero()
    {
        return $this->belongsTo(Invernadero::class, 'invernadero_id');
    }
}
