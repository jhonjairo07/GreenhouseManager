<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaGasto extends Model
{
    protected $table = 'categorias_gastos';

    protected $fillable = [
        'nombre',
        
    ];
    public function gastos()
    {
        return $this->hasMany(Gasto::class, 'categorias_gastos_id');
    }
}
