<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peticao extends Model
{
    use HasFactory;

    protected $table="Peticao";

    protected $fillable = [
        'id',
        'descricaoCrime',
        'id_autorPeticao',
        'created_at',
        'updated_at'
    ];

}
