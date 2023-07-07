<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Enroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class TeacherAuthController extends Controller
{
    private $teacher;

    public function index()
    {
        return view('teacher.login.index');
    }

    public function login(Request $request)
    {
        $this->teacher = Teacher::where('email', $request->email)->first();
        if ($this->teacher) {
            if (password_verify($request->password, $this->teacher->password)) {
                Session::put('teacher_id', $this->teacher->id);
                Session::put('teacher_name', $this->teacher->name);
                Session::put('teacher_image', $this->teacher->image);
                return redirect('/teacher/dashboard');
            } else {
                return back()->with('message', 'Sorry..Password is Wrong.');
            }
        } else {
            return back()->with('message', 'Sorry..email address is wrong.');
        }
    }

    public function dashboard()
    {
        $publishedCourseCount = Course::where('status', 1)->where('teacher_id',  Session::get('teacher_id'))->count();
        $unpublishedCourseCount = Course::where('status', 0)->where('teacher_id',  Session::get('teacher_id'))->count();
        return view('teacher.dashboard.index',  ['unpublishedCourseCount' => $unpublishedCourseCount, 'publishedCourseCount' => $publishedCourseCount]);
    }

    public function logout()
    {
        Session::forget('teacher_id');
        Session::forget('teacher_name');
        return redirect('/teacher/login');
    }

    public function enrolledStudent(){
        $enrolls = DB::table('enrolls')
            ->join('courses', function ($join) {
                $join->on('courses.id', '=', 'enrolls.course_id')
                     ->where('courses.teacher_id', '=',  Session::get('teacher_id'));
            })
            ->join('students', 'students.id', '=', 'enrolls.student_id')
            ->where('enroll_status', 'approved')
            ->select('enrolls.*', 'courses.title as course_title', 'students.name as student_name')
            ->get();
        return view('teacher.enroll.enrolledStudent',['enrolls'=>$enrolls]);
    }
}
