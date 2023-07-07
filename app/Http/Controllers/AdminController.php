<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enroll;
use App\Models\Student;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $course,$courses,$message;
    public function manageCourse()
    {
        $this->courses = Course::all();
        return view('admin.course.manage',['courses'=>$this->courses]);
    }

    public function courseDetail($id)
    {
        $this->course = Course::find($id);
        return view('admin.course.detail',['course'=>$this->course]);
    }

    public function updateCourseStatus($id)
    {
        $this->message= Course::UpdateCourseStatus($id);
        return back()->with('message',$this->message);

    }


    public function manageEnroll()
    {
        $enrolls = Enroll::all();
        return view('admin.enroll.manage',['enrolls'=>$enrolls]);
    }

    public function updateEnrollStatus($id)
    {
        $this->message= Enroll::UpdateEnrollStatus($id);
        return back()->with('message',$this->message);

    }
}
