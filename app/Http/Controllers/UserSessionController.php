<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserSessionController extends Controller
{
    public function viewLogin()
    {
        return Inertia('Auth/Login');
    }

    public function viewRegister()
    {
        return Inertia('Auth/Register');
    }
}
