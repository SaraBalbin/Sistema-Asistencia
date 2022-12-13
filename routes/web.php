<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;

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

Route::get('/', function () {
    return view('welcome');
});

// Auxiliar para registrar

Route::get('/register2', [RegisterController::class, 'show']);
Route::post('/register2', [RegisterController::class, 'register2']);


# Manejo de Sesion

Route::get('/login', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LogoutController::class, 'logout']);


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
