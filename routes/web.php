<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherAuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseMaterialController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\StudentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/about-us',[HomeController::class,'about'])->name('about');
Route::get('/course-category/{id}',[HomeController::class,'courseCategory'])->name('course-category');
Route::get('/all-course',[HomeController::class,'allCourse'])->name('all-course');
Route::get('/course-detail/{id}',[HomeController::class,'courseDetail'])->name('course-detail');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/login-registration',[HomeController::class,'auth'])->name('login-registration');

Route::post('/course-enroll/{id}',[EnrollController::class,'newEnroll'])->name('course-enroll');
Route::get('/complete-enroll',[EnrollController::class,'completeEnroll'])->name('complete-enroll');

Route::post('/student-login',[StudentController::class,'login'])->name('student-login');
Route::post('/student-register',[StudentController::class,'register'])->name('student-register');
Route::get('/my-dashboard',[StudentController::class,'dashboard'])->name('my-dashboard');
Route::get('/my-profile',[StudentController::class,'profile'])->name('my-profile');
Route::get('/logout',[StudentController::class,'logout'])->name('student-logout');

Route::get('/teacher/login',[TeacherAuthController::class,'index'])->name('teacher.login');
Route::post('/teacher/login',[TeacherAuthController::class,'login'])->name('teacher.login');

Route::middleware(['teacher.auth'])->group(function (){
    Route::get('/teacher/dashboard',[TeacherAuthController::class,'dashboard'])->name('teacher.dashboard');
    Route::get('/teacher/enrolled-student',[TeacherAuthController::class,'enrolledStudent'])->name('teacher.enrolled.student');
    Route::post('/teacher/logout',[TeacherAuthController::class,'logout'])->name('teacher.logout');

    Route::get('/course/add',[CourseController::class,'index'])->name('course.add');
    Route::post('/course/create',[CourseController::class,'create'])->name('course.create');
    Route::get('/course/manage',[CourseController::class,'manage'])->name('course.manage');
    Route::get('/course/detail/{id}',[CourseController::class,'detail'])->name('course.detail');
    Route::get('/course/edit/{id}',[CourseController::class,'edit'])->name('course.edit');
    Route::post('/course/update/{id}',[CourseController::class,'update'])->name('course.update');
    Route::post('/course/delete/{id}',[CourseController::class,'delete'])->name('course.delete');

    //Course Material
    Route::get('/course/{id}/material/add',[CourseMaterialController::class,'index'])->name('course.material.add');
    Route::post('/course-material/{id}/create',[CourseMaterialController::class,'create'])->name('course.material.create');
//    Route::get('/course-material/manage',[CourseMaterialController::class,'manage'])->name('course.material.manage');
//    Route::get('/course-material/detail/{id}',[CourseMaterialController::class,'detail'])->name('course.material.detail');
//    Route::get('/course-material/edit/{id}',[CourseMaterialController::class,'edit'])->name('course.material.edit');
//    Route::post('/course-material/update/{id}',[CourseMaterialController::class,'update'])->name('course.material.update');
//    Route::post('/course-material/delete/{id}',[CourseMaterialController::class,'delete'])->name('course.material.delete');


});



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard',[DashBoardController::class,'index'] )->name('dashboard');
    Route::get('/teacher/add',[TeacherController::class,'index'] )->name('teacher.add');
    Route::get('/teacher/manage',[TeacherController::class,'manage'] )->name('teacher.manage');
    Route::post('/teacher/create',[TeacherController::class,'create'] )->name('teacher.create');
    Route::get('/teacher/edit/{id}',[TeacherController::class,'edit'] )->name('teacher.edit');
    Route::post('/teacher/update/{id}',[TeacherController::class,'update'] )->name('teacher.update');
    Route::post('/teacher/delete/{id}',[TeacherController::class,'delete'] )->name('teacher.delete');

    Route::get('/category/add',[CategoryController::class,'index'] )->name('category.add');
    Route::get('/category/manage',[CategoryController::class,'manage'] )->name('category.manage');
    Route::post('/category/create',[CategoryController::class,'create'] )->name('category.create');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'] )->name('category.edit');
    Route::post('/category/update/{id}',[CategoryController::class,'update'] )->name('category.update');
    Route::post('/category/delete/{id}',[CategoryController::class,'delete'] )->name('category.delete');

    Route::get('/admin/manage-enroll',[AdminController::class,'manageEnroll'] )->name('admin.manage-enroll');
    Route::get('/admin/update-enroll-status/{id}',[AdminController::class,'updateEnrollStatus'] )->name('admin.update-enroll-status');
    Route::get('/admin/manage-course',[AdminController::class,'manageCourse'] )->name('admin.manage-course');
    Route::get('/admin/course-detail/{id}',[AdminController::class,'courseDetail'] )->name('admin.course-detail');
    Route::get('/admin/update-course-status/{id}',[AdminController::class,'updateCourseStatus'] )->name('admin.update-course-status');
});
