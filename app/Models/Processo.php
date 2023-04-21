<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    use HasFactory;

    protected $table ='Processo';

    protected $fillable = [
        'id',
        'id_reu',
        'id_TipoCrime',
        'DataHora',
        'localinicidente',
        'relatorio',
        'evidencia'
    ];
}
