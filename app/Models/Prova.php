<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prova extends Model
{
    use HasFactory;

    protected $table="Prova";

    protected $fillable = [
        'id',
        'urlFile',
        'descricao',
        'id_reu',
        'id_vitima',
        'id_autorPeticao',
        'id_peticao',
        'created_at',
        'updated_at'
    ];

}
