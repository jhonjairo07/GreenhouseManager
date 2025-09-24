<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cosecha extends Model
{
    protected $table = 'cosechas';

    protected $fillable = [
        'invernadero_id',
        'cultivo_id',
        'fecha_creacion',
        'fecha_siembra',
        'fecha_cosecha_estimada',
        'fecha_cosecha_real',
        'cantidad_sembrada',
        'total_gastos',
        'total_ingresos',
        'utilidad',
        'id_estado',
        'notas',
    ];

    public function invernadero()
    {
        return $this->belongsTo(Invernadero::class, 'invernadero_id');
    }

    public function tipoCultivo()
    {
        return $this->belongsTo(TipoCultivo::class, 'cultivo_id');
    }

    public function estadoCosecha()
    {
        return $this->belongsTo(EstadoCosecha::class, 'id_estado');
    }

    public function ingreso()
    {
        return $this->hasMany(Ingreso::class, 'cosechas_id');
    }

    public function gasto()
    {
        return $this->hasMany(Gasto::class, 'cosechas_id');
    }
}
