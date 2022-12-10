<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

class UserController extends Controller{

    public function showRegister(){
        return view('admin.createUser');
    }

    public function register(RegisterRequest $request){
        
        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->setPasswordAttribute($request->password);
        $user->role = $request-> role;
        $user->save();
        return redirect('/adminUsers');
    }

    public function index() {
        $viewData = [];
        $viewData["users"] = User::all();
        return view('admin.adminUsers')->with("viewData", $viewData);
    }

    public function delete($id) {
        $user = User::find($id);
        $user->delete();
        return redirect('/adminUsers');

    }
    public function showEdit($id){
        $viewData = [];
        $user = User::findOrFail($id);
        $viewData["user"] = $user;
        return view('admin.editUser')->with("viewData", $viewData);
    }

    public function edit(Request $request) {

        $id = $request->id;
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->setPasswordAttribute($request->password);
        $user->role = $request-> role;
        $user->save();
        return redirect('/adminUsers');

    }

    
}
