<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(){
        Session::flush(); // Actualizar flujo de sesion y liberar
        Auth::logout(); // Terminar sesion
        return redirect()->to('/login');
    }
}
