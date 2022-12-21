<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function indexAdmin() {
        return view('admin.homeAdmin');
    }

    public function indexTeacher() {
        return view('teacher.homeTeacher');
    }
    
    public function indexStudent() {
        return view('student.homeStudent');
    }
}
