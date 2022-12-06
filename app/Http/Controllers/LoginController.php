<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function show(){
        if(Auth::check()){ // Si hay un usuario con sesion
            return redirect('/home');
        }
        return view('auth.login');
    }

    public function login(LoginRequest $request){

        $credentials = $request->getCredentials();
        
        if(!Auth::validate($credentials)){
            return redirect() -> to('/login') -> withErrors('auth.failed');
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
        return $this->authenticated($request, $user);
        
    }

    protected function authenticated(Request $request, $user) {
        return redirect('/home');
    }
}
