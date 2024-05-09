<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table='empresa';
    protected $fillable = [
        'identificacion',
        'razonsocial'
    ];

    public function numeraciones()
    {
        return $this->hasMany(Numeracion::class);
    }

    public function documentos()
    {
        return $this->hasManyThrough(Documento::class, Numeracion::class);
    }
}
