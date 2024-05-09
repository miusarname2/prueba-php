<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class numeracion extends Model
{
    use HasFactory;

    protected $table = 'numeracion';
    protected $fillable =[
        'idtipodocumento',
        'idempresa',
        'prefijo',
        'consecutivo inicial',
        'consecutivofinal',
        'vigenciainicial',
        'vigenciafinal'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class);
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }

}
