<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class processController extends Controller
{
    public function processo(){
        return view('pages.novo_processo');
    }
}
