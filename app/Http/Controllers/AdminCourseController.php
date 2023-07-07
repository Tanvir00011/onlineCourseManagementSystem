<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class AdminCourseController extends Controller
{
    private $training,$courses,$message;
    public function index()
    {
        $this->courses = Course::all();
        return view('admin.training.manage',['courses'=>$this->courses]);
    }

    public function detail($id)
    {
        $this->training = Course::find($id);
        return view('admin.training.detail',['training'=>$this->training]);
    }

    public function updateStatus($id)
    {
        $this->message= Course::UpdateTrainingStatus($id);
        return back()->with('message',$this->message);

    }
}
