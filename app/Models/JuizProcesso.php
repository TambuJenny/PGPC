<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JuizProcesso extends Model
{
    use HasFactory;

    protected $table = 'JuizProcesso';

    protected $fillable = 
    [
        'id',
        'idjuiz',
        'idprocesso',
        'estado'
    ];

}
