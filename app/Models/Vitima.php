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
        'id_pessoa',
        'id_peticao'
    ];
}
