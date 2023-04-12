<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function Login()
    {
        return View('index');
    }
    public function Menu()
    {
        return View('pages.menu');
    }
    public function NewAccount()
    {
        return View('pages.newAccount');
    }
}
