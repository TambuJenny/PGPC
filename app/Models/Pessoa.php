<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;
    protected $table ='Pessoas';

    protected $fillable = [
        'id',
        'nome',
        'email',
        'endereco',
        'data_nascimento',
        'telefone',
        'bi'
    ];

}
