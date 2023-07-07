<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class AdminCourseController extends Controller
{
    private $training,$trainings,$message;
    public function index()
    {
        $this->trainings = Course::all();
        return view('admin.training.manage',['trainings'=>$this->trainings]);
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
