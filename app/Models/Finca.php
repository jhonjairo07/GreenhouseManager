<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finca extends Model
{
    protected $table = 'fincas';

    protected $fillable = [
        'nombre',
        'ubicacion'
        
    ];

    public function invernadero()
    {
        return $this->hasMany(Invernadero::class, 'finca_id');
    }
}
