<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table = 'ingresos';

    protected $fillable = [
        'cosechas_id',
        'fecha',
        'descripcion',
        'cantidad_vendida',
        'precio_unitario',
    ];

    public function cosecha()
    {
        return $this->belongsTo(Cosecha::class, 'cosechas_id');
    }
}
