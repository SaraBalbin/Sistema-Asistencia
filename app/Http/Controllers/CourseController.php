<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\TeacherAssignment;
use App\Models\StudentEnrollment;
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
    # Metodos para matricular estudiante

    public function indexEnroll() {
        $viewData = [];
        $viewData["courses"] = Course::all();
        return view('admin.adminEnroll')->with("viewData", $viewData);
    }

    public function showStudents($id){
        $viewData = [];
        $students = User::select('id', 'name', 'email', 'role')
                        ->where("role", "=", "Estudiante")
                        ->get();
        $viewData["students"] = $students;
        $viewData["idCourse"] = $id;
        return view('admin.showStudents')->with("viewData", $viewData);
    }
    
    public function enrollment(Request $request){
        foreach ($request['studentsEnroll'] as $id_student) {
            $quantityEnrollment = StudentEnrollment::where(["id_student" => $id_student, 'id_course'  => $request['id']])
                        ->count();
            if ($quantityEnrollment == 0){
                $enroll = new StudentEnrollment;
                $enroll->id_student = $id_student;
                $enroll->id_course = $request['id'];
                $enroll->save();
            }
        }
        return redirect('/adminEnroll');
    }

    public function showEnroll($id_course){
        $viewData = [];
        $courseStudents =  DB::table('student_enrollments')
                        ->where("id_course", "=", $id_course)
                        ->select('student_enrollments.id as student_enrollments_id', 'users.id as user_id', 'users.name as user_name', 'users.email as user_email')
                        ->join("users", "student_enrollments.id_student", "=", "users.id")
                        ->get();
        $viewData["courseStudents"] = $courseStudents;
        // return $viewData["courseStudents"];
        return view('admin.showEnroll')->with("viewData", $viewData);
    }

    public function deleteEnroll($id_student_enrollments){
        $enroll = StudentEnrollment::find($id_student_enrollments);
        $enroll->delete();
        return redirect('/adminEnroll');
    }

    public function enrollmentSearch(Request $request){
        $student = User::where(['id' => $request['id_student'], 'role' => 'Estudiante'])
            ->select('id')->count();
        $course = Course::where(['id' => $request['id_course']])
            ->select('id')->count();
        if ($student > 0 and $course > 0) {
            $quantityEnrollment = StudentEnrollment::where(["id_student" => $request['id_student'], 'id_course' => $request['id_course']])
                ->count();
            if ($quantityEnrollment == 0) {
                $enroll = new StudentEnrollment;
                $enroll->id_student = $request['id_student'];
                $enroll->id_course = $request['id_course'];
                $enroll->save();
            }
            return redirect('/adminEnroll');
        }
    }

    # Metodos para ver cursos de profesor

    public function showTeacherCourses(){
        $teacher_id = auth()->user()->id;
        $viewData = [];
        $courseTeacher =  DB::table('teacher_assignments')
                        ->select('courses.id as courses_id', 'courses.code as courses_code', 'courses.name as courses_name', 'courses.description as description', 'courses.classroom as classroom',)
                        ->where("id_teacher", "=", $teacher_id)
                        ->join("courses", "courses.id", "=", "teacher_assignments.id_course", 'left outer')
                        ->get();
        $viewData["courseTeacher"] = $courseTeacher;
        return $viewData;
    }

    public function showCourses1() {
        $viewData = $this->showTeacherCourses();
        return view('teacher.showCourses1')->with("viewData", $viewData);
    }

    // public function showCourses2() {
    //     $viewData = $this->showTeacherCourses();
    //     return view('teacher.showCourses2')->with("viewData", $viewData);
    // }


    
 }
