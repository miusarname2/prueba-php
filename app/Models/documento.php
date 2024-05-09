<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documento extends Model
{
    use HasFactory;

    protected $table = 'documento';
    protected $fillable = [
        'idnumeracion',
        'idestado',
        'numero',
        'fecha',
        'base',
        'impuestos'
    ];

    public function numeracion()
    {
        return $this->belongsTo(Numeracion::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}
