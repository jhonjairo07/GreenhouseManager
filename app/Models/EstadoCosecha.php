<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoCosecha extends Model
{
    protected $table = 'estados_cosecha';
    

    protected $fillable = [
        'nombre',
    ];

    public function cosecha()
    {
        return $this->hasMany(Cosecha::class, 'id_estado');
    }
}
