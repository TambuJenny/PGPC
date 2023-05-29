<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peticao extends Model
{
    use HasFactory;

    protected $table="peticao";

    protected $fillable = 
    [
        'id',
        'id_autorPeticao',
        'descricaoCrime',
        'created_at',
        'updated_at'
    ];
}
