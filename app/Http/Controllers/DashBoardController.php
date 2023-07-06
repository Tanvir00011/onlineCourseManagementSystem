<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Training;

class DashBoardController extends Controller
{
    public function index()
    {
        $teacherCount = Teacher::count();
        $studentCount = Student::count();
        $publishedCourseCount = Training::where('status',1)->count();
        return view('admin.home.index',  ['teacherCount' => $teacherCount, 'studentCount' => $studentCount, 'publishedCourseCount' => $publishedCourseCount]);
    }
}
