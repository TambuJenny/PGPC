<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivelacesso extends Model
{
    use HasFactory;
    protected $table = 'nivelacesso';

    protected $fillable = 
    [
        'id',
        'nivel',
        'acesso',
    ];
}
