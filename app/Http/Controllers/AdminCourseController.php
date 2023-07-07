<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class AdminCourseController extends Controller
{
    private $course,$courses,$message;
    public function index()
    {
        $this->courses = Course::all();
        return view('admin.course.manage',['courses'=>$this->courses]);
    }

    public function detail($id)
    {
        $this->course = Course::find($id);
        return view('admin.course.detail',['course'=>$this->course]);
    }

    public function updateStatus($id)
    {
        $this->message= Course::UpdateCourseStatus($id);
        return back()->with('message',$this->message);

    }
}
