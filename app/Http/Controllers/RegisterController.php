<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function show(){
        if(Auth::check()){
            return redirect('/home');
        }
        return view('auth.register');
    }

    public function register2(RegisterRequest $request){
        
        // $user = User::create($request->validated());
        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->setPasswordAttribute($request->password);
        $user->role = $request-> role;
        $user->save();
        return redirect('/login')->with('success', "Account successfully registered.");
    }
}