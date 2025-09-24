<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoCultivo extends Model
{
    protected $table = 'tipos_cultivo';
    

    protected $fillable = [
        'nombre',
        'ciclo_dias',
    ];
    public function cosecha()
    {
        return $this->hasMany(Cosecha::class, 'cultivo_id');
    }
}
