<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller {

    public function showRegister(){
        return view('admin.createCourse');
    }

    public function register(Request $request){
        
        $course = new Course;
        $course->code = $request->code;
        $course->name = $request->name;
        $course->description = $request->description;
        $course->classroom = $request->classroom;
        $course->methodology = $request-> methodology;
        $course->save();
        return redirect('/adminCourses');
    }

    public function index() {
        $viewData = [];
        $viewData["courses"] = Course::all();
        return view('admin.adminCourses')->with("viewData", $viewData);
    }

    public function delete($id) {
        $user = Course::find($id);
        $user->delete();
        return redirect('/adminCourses');

    }
    public function showEdit($id){
        $viewData = [];
        $course = Course::findOrFail($id);
        $viewData["course"] = $course;
        return view('admin.editCourse')->with("viewData", $viewData);
    }

    public function edit(Request $request) {

        $id = $request->id;
        $course = Course::findOrFail($id);
        $course->code = $request->code;
        $course->name = $request->name;
        $course->description = $request->description;
        $course->classroom = $request->classroom;
        $course->methodology = $request-> methodology;
        $course->save();
        return redirect('/adminCourses');

    }
    
}
