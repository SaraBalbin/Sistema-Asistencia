<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Lesson;
use Illuminate\Support\Facades\DB;


class LessonController extends Controller
{
    public function showCreate($id_course){
        $viewData = [];
        $viewData["idCourse"] = $id_course;
        return view('teacher.createLesson') ->with("viewData", $viewData);
    }
    public function create(Request $request){
        $lesson = new Lesson;
        $lesson->number = $request->number;
        $lesson->topic = $request->topic;
        $lesson->description_topic = $request->description_topic;
        $lesson->id_course = $request->id_course;
        $lesson->save();
        return redirect('/showTeacherCourses');
    }
    public function listLessonTeacher($id_course){
        $lessons = Lesson::where("id_course", "=", $id_course)
                        ->get();
        $name = Course::where("id", "=", $id_course)
                        ->select('name')
                        ->first();
        $viewData = [];
        $viewData["lessons"] = $lessons;
        $viewData["name"] = $name;
        $viewData["id_course"] = $id_course;

        return view('teacher.adminLesson') ->with("viewData", $viewData);
    }

    public function listLessonStudent($id_course){
        $lessons = Lesson::where("id_course", "=", $id_course)
                        ->get();
        $name = Course::where("id", "=", $id_course)
                        ->select('name')
                        ->first();
        $viewData = [];
        $viewData["lessons"] = $lessons;
        $viewData["name"] = $name;
        $viewData["id_course"] = $id_course;
        $viewData["attendance"] = [];

        $id_student = auth()->user()->id;

        foreach ($lessons as $lesson) {
            $attendanceStudent =  DB::table('attendances')
                    ->where(['id_lesson' => $lesson -> id, 'id_student' => $id_student])
                    ->count();   
            if ($attendanceStudent == 1){
                array_push($viewData["attendance"], $lesson -> id);
            }       
        }
        return view('student.listLesson') ->with("viewData", $viewData);
    }

    public function deleteLesson($id_lesson, $id_course) {
        $lesson = Lesson::find($id_lesson);
        $lesson->delete();
        return $this->listLesson($id_course, 1);

    }
    public function showEditLesson($id_lesson, $id_course){
        $viewData = [];
        $lesson = Lesson::findOrFail($id_lesson);
        $viewData["lesson"] = $lesson;
        $viewData["id_course"] = $id_course;
        return view('teacher.editLesson')->with("viewData", $viewData);
    }

    public function editLesson(Request $request) {
        $id_course = $request->id_course;
        $id = $request->id;
        $lesson = Lesson::findOrFail($id);
        $lesson->number = $request->number;
        $lesson->topic = $request->topic;
        $lesson->description_topic = $request->description_topic;
        $lesson->save();
        return $this->listLesson($id_course, 1);

    }

}
