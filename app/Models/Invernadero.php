<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invernadero extends Model
{
    protected $table = 'invernaderos';
    

    protected $fillable = [
        'nombre',
        'tamano',
        'finca_id',
        'costoConstruccion',
        'rendimiento',
    ];

    public function finca()
    {
        return $this->belongsTo(Finca::class, 'finca_id');
    }

    public function cosecha()
    {
        return $this->hasMany(Cosecha::class, 'invernadero_id');
    }

    public function mantenimiento()
    {
        return $this->hasMany(MantenimientoInvernadero::class, 'invernadero_id');
    }
}
