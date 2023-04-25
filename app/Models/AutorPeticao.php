<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutorPeticao extends Model
{
    use HasFactory;

    protected $table = 'Autor_peticao';

    protected $fillable = 
    [
        'id',
        'id_Pessoa',
        'created_at',
        'updated_at',
        'created_at',
        'updated_at'
    ];
}
