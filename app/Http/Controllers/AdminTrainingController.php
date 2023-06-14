<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

class AdminTrainingController extends Controller
{
    private $training,$trainings,$message;
    public function index()
    {
        $this->trainings = Training::all();
        return view('admin.training.manage',['trainings'=>$this->trainings]);
    }

    public function detail($id)
    {
        $this->training = Training::find($id);
        return view('admin.training.detail',['training'=>$this->training]);
    }

    public function updateStatus($id)
    {
        $this->message= Training::UpdateTrainingStatus($id);
        return back()->with('message',$this->message);

    }
}
