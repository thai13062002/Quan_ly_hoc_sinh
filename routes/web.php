<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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

Route::get('/', [StudentController::class, 'get_all_student'])->name('student');
//them
Route::get('/student_add', [StudentController::class, 'create_student'])->name('student-add');
Route::post('/student_add', [StudentController::class, 'add_student']);


//sua
Route::get('/student_edit/{id}', [StudentController::class, 'get_student_by_id']);
Route::post('/student_edit/{id}', [StudentController::class, 'edit']);

//xoa
Route::get('/student_destroy/{id}', [StudentController::class, 'destroy']);
