<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reu extends Model
{
    use HasFactory;
    protected $table ='Reu';

    protected $fillable = [
        'id',
        'id_Pessoa',
        'url_imageFoto'
    ];
}
