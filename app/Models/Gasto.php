<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    protected $table = 'gastos';
    

    protected $fillable = [
        'cosechas_id',
        'categorias_gastos_id',
        'fecha',
        'descripcion',
        'monto',
    ];  
    public function cosecha()
    {
        return $this->belongsTo(Cosecha::class, 'cosechas_id');
    }

    public function categoria()
    {
        return $this->belongsTo(CategoriaGasto::class, 'categorias_gastos_id');
    }
}
