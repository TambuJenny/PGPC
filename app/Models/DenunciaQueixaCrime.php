<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DenunciaQueixaCrime extends Model
{
    use HasFactory;

    protected $table ='DenunciaQueixaCrime';

    protected $fillable = [
        'id',
        'id_reu',
        'descricao_crime',
        'id_TipoCrime',
        'id_provas',
        'id_peticao',
        'created_at',
        'updated_at'
    ];
}
