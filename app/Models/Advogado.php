<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advogado extends Model
{
    use HasFactory;
    protected $table = 'Advogado';

    protected $fillable = 
    [
        'id',
        'nia',
        'id_pessoa',
    ];
}
