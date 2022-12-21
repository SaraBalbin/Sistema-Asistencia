<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\Lesson;

class AttendanceController extends Controller
{
    # Metodos asistencia para profesor
    public function showStudentsCourse($id_course, $id_lesson){
        $viewData = [];

        $students = DB::table('student_enrollments')
            ->select('users.id as user_id', 'users.name as user_name', 'users.email as user_email')
            ->where("id_course", "=", $id_course)
            ->join("users", "users.id", "=", "student_enrollments.id_student")
            ->leftJoin('attendances', function ($join) use ($id_lesson) {
                $join -> on('users.id', '=', 'attendances.id_student')
                        ->where("id_lesson", "=", $id_lesson);
                })
            ->whereNull('attendances.id_student')
            ->get();

        $viewData["students"] = $students;
        $viewData["idCourse"] = $id_course;
        $viewData["idLesson"] = $id_lesson;
        return view('teacher.courseStudents')->with("viewData", $viewData);
    }
    
    public function registerAttendance(Request $request){
        foreach ($request['studentsAttendance'] as $id_student) {
            $attendance = new Attendance;
            $attendance->id_student = $id_student;
            $attendance->id_lesson = $request['idLesson'];
            $attendance->save();
        }
        $ruta = '/showStudentsCourse/' . $request['idCourse'] .'/'. $request['idLesson'];
        return redirect($ruta);
    }

    public function showAttendance($id_course, $id_lesson){
        $viewData = [];
        $attendanceStudents =  DB::table('attendances')
                        ->where("id_lesson", "=", $id_lesson)
                        ->select('attendances.id as attendances_id', 'users.id as user_id', 'users.name as user_name', 'users.email as user_email')
                        ->join("users", "attendances.id_student", "=", "users.id")
                        ->get();

        $lesson = Lesson::where(['id' => $id_lesson])->first();

        $viewData["attendanceStudents"] = $attendanceStudents;
        $viewData["id_course"] = $id_course;
        $viewData["lesson"] = $lesson;
        return view('teacher.showAttendance')->with("viewData", $viewData);
    }

    public function deleteAttendance($id_student_attendance, $id_course, $id_lesson){
        $attendance = Attendance::find($id_student_attendance);
        $attendance->delete();
        return $this -> showAttendance($id_course, $id_lesson);
    }

}
