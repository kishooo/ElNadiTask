<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\taskController;
//use app\Http\Controllers\taskController;
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

Route::get('/',[taskController::class,'ShowAllStudent']);
Route::post('/remove',[taskController::class,'Remove'])->name('remove');
Route::get('/edit/{id}',[taskController::class,'edit']);
Route::post('/edit/{id}',[taskController::class,'DoEdit']);
Route::get('/courses',[taskController::class,'ShowAllCourses']);
Route::post('/removeCourse',[taskController::class,'RemoveCourse'])->name('removeCourse');
Route::get('/course/edit/{id}',[taskController::class,'edit']);
Route::post('/course/edit/{id}',[taskController::class,'DoEdit']);
Route::get('/show/{id}',[taskController::class,'ShowAllStudentCourse']);
Route::post('/removeStudent',[taskController::class,'RemoveCourse'])->name('removeStudentCourse');
Route::get('/create',[taskController::class,'create']);
Route::post('/createStudent',[taskController::class,'createStudent']);
Route::post('/createCourse',[taskController::class,'createCourse']);
