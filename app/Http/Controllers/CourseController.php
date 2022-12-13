<?php

namespace App\Http\Controllers;

use App\Models\TeacherAssignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\User;

class CourseController extends Controller {

    # Metodos para administracion de cursos

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

    # Metodos para asignar Profesor

    public function indexAssignment(){
        $viewData = [];
        $courseTeacher =  DB::table('courses')
                        -> select('courses.id as courses_id', 'courses.code as courses_code', 'courses.name as courses_name', 'users.name as teacher_name', 'teacher_assignments.id as assignments_id')
                        ->join("teacher_assignments", "courses.id", "=", "teacher_assignments.id_course", 'left outer')
                        ->join("users", "users.id", "=", "teacher_assignments.id_teacher", 'left outer')
                        ->get();
        $viewData["courseTeacher"] = $courseTeacher;
        return view('admin.adminAssignment')->with("viewData", $viewData);
    }

    public function showTeachers($id){
        $viewData = [];
        $teachers = User::select('id', 'name', 'email', 'role')
                        ->where("role", "=", "Profesor")
                        ->get();
        $viewData["teachers"] = $teachers;
        $viewData["idCourse"] = $id;
        return view('admin.showTeachers')->with("viewData", $viewData);
    }

    public function Assignment($idCourse, $idTeacher){
        $assignment = TeacherAssignment::where(["id_teacher" => $idTeacher, 'id_course'  => $idCourse])
                     ->count();
        $quantity = TeacherAssignment::where(['id_course'  => $idCourse])
                     ->count();
        if ($assignment == 0){
            if ($quantity > 0){
                $idAssign = TeacherAssignment::select('id')
                ->where(['id_course'  => $idCourse])
                ->first();
                $teacherAssignment = TeacherAssignment::find($idAssign['id']);
                $teacherAssignment->delete();
            }
            $assignment = new TeacherAssignment;
            $assignment->id_teacher = $idTeacher;
            $assignment->id_course = $idCourse;
            $assignment->save();
        }
        return redirect('/adminAssignment');
    }

    public function AssignmentSearch(Request $request){
        $Teacher = User::where(['id' => $request['id_teacher'], 'role' => 'Profesor'])
                   ->select('id')->count();
        $Course = Course::where(['id' => $request['id_course']])
                   ->select('id')->count();
        if ($Teacher > 0 and $Course > 0){
            $this->Assignment($request['id_course'], $request['id_teacher']);
        } 
        return redirect('/adminAssignment');

    }



    
}
