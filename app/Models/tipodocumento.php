<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipodocumento extends Model
{
    use HasFactory;

    protected $table = 'tipodocumento';
    protected $fillable = [
        'descripcion'
    ];
}
