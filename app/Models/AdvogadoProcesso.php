<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvogadoProcesso extends Model
{
    use HasFactory;

    protected $table = 'AdvogadoProcesso';

    protected $fillable = 
    [
        'id',
        'idadvogado',
        'idprocesso',
        'idvitima',
        'idreu',
        'estado',
        'created_at',
        'updated_at'
    ];
}
