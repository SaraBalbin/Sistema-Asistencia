<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\AttendanceController;

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

# Auxiliar para registrar
// Route::get('/register2', [RegisterController::class, 'show']);
// Route::post('/register2', [RegisterController::class, 'register2']);


# Manejo de Sesion
Route::get('/', [LoginController::class, 'show']);
Route::post('/', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);


# Redireccion a HOME
Route::get('/homeAdmin', [HomeController::class, 'indexAdmin']);
Route::get('/homeTeacher', [HomeController::class, 'indexTeacher']);
Route::get('/homeStudent', [HomeController::class, 'indexStudent']);

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
Route::get('/register', [UserController::class, 'showRegister']) -> middleware('activeSesion') -> middleware('adminAccess');
Route::post('/register', [UserController::class, 'register']) -> middleware('activeSesion') -> middleware('adminAccess');
Route::get('/adminUsers', [UserController::class, 'index']) -> middleware('activeSesion') -> middleware('adminAccess');
Route::get('/showEdit/{id}', [UserController::class, 'showEdit']) -> name("user.showEdit") -> middleware('activeSesion') -> middleware('adminAccess');
Route::get('/delete/{id}', [UserController::class, 'delete']) ->name("user.delete") -> middleware('activeSesion') -> middleware('adminAccess');
Route::post('/edit', [UserController::class, 'edit']);

# Acciones con Curso
Route::get('/registerCourse', [CourseController::class, 'showRegister']) -> middleware('activeSesion') -> middleware('adminAccess');
Route::post('/registerCourse', [CourseController::class, 'register']) -> middleware('activeSesion') -> middleware('adminAccess');
Route::get('/adminCourses', [CourseController::class, 'index']) -> middleware('activeSesion') -> middleware('adminAccess');
Route::get('/showEditCourse/{id}', [CourseController::class, 'showEdit']) ->name("course.showEditCourse") -> middleware('activeSesion') -> middleware('adminAccess');
Route::get('/deleteCourse/{id}', [CourseController::class, 'delete']) ->name("course.deleteCourse") -> middleware('activeSesion') -> middleware('adminAccess');
Route::post('/editCourse', [CourseController::class, 'edit']) -> middleware('activeSesion') -> middleware('adminAccess');

# Asignar Profesor
Route::get('/adminAssignment', [CourseController::class, 'indexAssignment']) -> middleware('activeSesion') -> middleware('adminAccess');
Route::get('/showTeachers/{id}', [CourseController::class, 'showTeachers']) ->name("course.showTeachers") -> middleware('activeSesion') -> middleware('adminAccess');
Route::get('/Assignment/{idCourse}/{idTeacher}', [CourseController::class, 'Assignment']) ->name("course.assignment") -> middleware('activeSesion') -> middleware('adminAccess');
Route::get('/deleteAssignment/{id}', [CourseController::class, 'deleteAssignment']) ->name("course.deleteAssignment") -> middleware('activeSesion') -> middleware('adminAccess');
Route::post('/AssignmentSearch', [CourseController::class, 'AssignmentSearch']) -> middleware('activeSesion') -> middleware('adminAccess');

# Matricular estudiantes
Route::get('/adminEnroll', [CourseController::class, 'indexEnroll']) -> middleware('activeSesion') -> middleware('adminAccess');
Route::get('/showStudents/{id}', [CourseController::class, 'showStudents']) ->name("course.showStudents") -> middleware('activeSesion') -> middleware('adminAccess');
Route::get('/showEnroll/{id_course}', [CourseController::class, 'showEnroll']) ->name("course.showEnroll") -> middleware('activeSesion') -> middleware('adminAccess');
Route::get('/deleteEnroll/{id_student_enrollments}/{id_course}', [CourseController::class, 'deleteEnroll']) ->name("course.deleteEnroll") -> middleware('activeSesion') -> middleware('adminAccess');
Route::post('/enrollment', [CourseController::class, 'enrollment']) -> middleware('activeSesion') -> middleware('adminAccess');
Route::post('/enrollmentSearch', [CourseController::class, 'enrollmentSearch']) -> middleware('activeSesion') -> middleware('adminAccess');

# PROFESOR

# Administrar cursos
Route::get('/showTeacherCourses', [CourseController::class, 'showTeacherCourses']) -> middleware('activeSesion') -> middleware('teacherAccess');
Route::get('/createLesson/{id_course}', [LessonController::class, 'showCreate']) ->name("lesson.showCreate") -> middleware('activeSesion') -> middleware('teacherAccess');
Route::post('/createLesson', [LessonController::class, 'create']) -> middleware('activeSesion') -> middleware('teacherAccess');
Route::get('/listLessonTeacher/{id_course}', [LessonController::class, 'listLessonTeacher']) ->name("lesson.listLessonTeacher") -> middleware('activeSesion') -> middleware('teacherAccess');
Route::get('/showEditLesson/{id_lesson}/{id_course}', [LessonController::class, 'showEditLesson']) ->name("lesson.showEditLesson") -> middleware('activeSesion') -> middleware('teacherAccess');
Route::get('/deleteLesson/{id_lesson}/{id_course}', [LessonController::class, 'deleteLesson']) ->name("lesson.deleteLesson") -> middleware('activeSesion') -> middleware('teacherAccess');
Route::post('/editLesson', [LessonController::class, 'editLesson']) -> middleware('activeSesion') -> middleware('teacherAccess');

# Administrar Registro de Asistencia
Route::get('/showStudentsCourse/{id_course}/{id_lesson}', [AttendanceController::class, 'showStudentsCourse']) ->name("attendance.showStudentsCourse") -> middleware('activeSesion') -> middleware('teacherAccess');
Route::post('/registerAttendance', [AttendanceController::class, 'registerAttendance']) -> middleware('activeSesion') -> middleware('teacherAccess');
Route::get('/showAttendance/{id_course}/{id_lesson}', [AttendanceController::class, 'showAttendance']) ->name("attendance.showAttendance") -> middleware('activeSesion') -> middleware('teacherAccess');
Route::get('/deleteAttendance/{id_student_attendance}/{id_course}/{id_lesson}', [AttendanceController::class, 'deleteAttendance']) ->name("attendance.deleteAttendance") -> middleware('activeSesion') -> middleware('teacherAccess');

# ESTUDIANTE
Route::get('/showStudentCourses', [CourseController::class, 'showStudentCourses']) -> middleware('activeSesion') -> middleware('studentAccess');
Route::get('/listLessonStudent/{id_course}', [LessonController::class, 'listLessonStudent']) ->name("lesson.listLessonStudent") -> middleware('activeSesion') -> middleware('studentAccess');

# RUTAS PARA INFORMACION
Route::get('/infoAdmin', [UserController::class, 'infoAdmin']) -> middleware('activeSesion') -> middleware('adminAccess');
Route::get('/infoTeacher', [UserController::class, 'infoTeacher']) -> middleware('activeSesion') -> middleware('teacherAccess');
Route::get('/infoStudent', [UserController::class, 'infoStudent']) -> middleware('activeSesion') -> middleware('studentAccess');
