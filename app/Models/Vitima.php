<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vitima extends Model
{
    use HasFactory;
    protected $table ='vitima';

    protected $fillable = [
        'id',
        'nome',
        'email',
        'sexo',
        'endereco',
        'data_nascimento',
        'telefone',
        'bi',
        'url_imageFoto'
    ];
}
