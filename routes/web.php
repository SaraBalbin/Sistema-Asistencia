<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auxiliar para registrar

Route::get('/register2', [RegisterController::class, 'show']);
Route::post('/register2', [RegisterController::class, 'register2']);


# Manejo de Sesion

Route::get('/', [LoginController::class, 'show']);
Route::post('/', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);


# Redireccion a HOME

Route::get('/homeAdmin', [HomeController::class, 'indexAdmin']);
Route::get('/homeTeacher', [HomeController::class, 'indexTeacher']);
Route::get('/homeStudent', [HomeController::class, 'index']);

Route::get('/home', function () {
    if( Auth::user() ) //se valida si esta logueado
        if (Auth::user()->role =='Administrador')
            return redirect('/homeAdmin');
        else if (Auth::user()->role =='Profesor')
            return redirect('/homeTeacher');
        else
            return redirect('/homeStudent');
    else
        return redirect('/login');
});

# ADMINISTRADOR

# Acciones con Usuario
Route::get('/register', [UserController::class, 'showRegister']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/adminUsers', [UserController::class, 'index']);
Route::get('/showEdit/{id}', [UserController::class, 'showEdit']) ->name("user.showEdit");
Route::get('/delete/{id}', [UserController::class, 'delete']) ->name("user.delete");
Route::post('/edit', [UserController::class, 'edit']);

# Acciones con Curso
Route::get('/registerCourse', [CourseController::class, 'showRegister']);
Route::post('/registerCourse', [CourseController::class, 'register']);
Route::get('/adminCourses', [CourseController::class, 'index']);
Route::get('/showEditCourse/{id}', [CourseController::class, 'showEdit']) ->name("course.showEditCourse");
Route::get('/deleteCourse/{id}', [CourseController::class, 'delete']) ->name("course.deleteCourse");
Route::post('/editCourse', [CourseController::class, 'edit']);

# Asignar Profesor
Route::get('/adminAssignment', [CourseController::class, 'indexAssignment']);
Route::get('/showTeachers/{id}', [CourseController::class, 'showTeachers']) ->name("course.showTeachers");
Route::get('/Assignment/{idCourse}{idTeacher}', [CourseController::class, 'Assignment']) ->name("course.assignment");
Route::get('/deleteAssignment/{id}', [CourseController::class, 'deleteAssignment']) ->name("course.deleteAssignment");
Route::post('/AssignmentSearch', [CourseController::class, 'AssignmentSearch']);

# Matricular estudiantes
Route::get('/adminEnroll', [CourseController::class, 'indexEnroll']);
Route::get('/showStudents/{id}', [CourseController::class, 'showStudents']) ->name("course.showStudents");
Route::get('/showEnroll/{id_course}', [CourseController::class, 'showEnroll']) ->name("course.showEnroll");
Route::get('/deleteEnroll/{id_student_enrollments}', [CourseController::class, 'deleteEnroll']) ->name("course.deleteEnroll");
Route::post('/enrollment', [CourseController::class, 'enrollment']);
Route::post('/enrollmentSearch', [CourseController::class, 'enrollmentSearch']);

# PROFESOR
Route::get('/showCourses1', [CourseController::class, 'showCourses1']);
Route::get('/createLesson/{id_course}', [LessonController::class, 'showCreate']) ->name("lesson.showCreate");;
Route::post('/createLesson', [LessonController::class, 'create']);
Route::get('/listLesson/{id_course}', [LessonController::class, 'listLesson']) ->name("lesson.listLesson");;
Route::get('/showEditLesson/{id_lesson}{id_course}', [LessonController::class, 'showEditLesson']) ->name("lesson.showEditLesson");
Route::get('/deleteLesson/{id_lesson}{id_course}', [LessonController::class, 'deleteLesson']) ->name("lesson.deleteLesson");
Route::post('/editLesson', [LessonController::class, 'editLesson']);