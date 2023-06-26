<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juiz extends Model
{

    use HasFactory;
    protected $table = 'Juiz';

    protected $fillable = 
    [
        'id',
        'nij',
        'id_pessoa',
    ];
}
