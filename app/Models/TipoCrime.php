<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCrime extends Model
{
    use HasFactory;

    protected $table ='TipoCrime';

    protected $fillable = [
        'id',
        'nome',
    ];
    
}
