<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\TrainingsMaterial;
use Illuminate\Http\Request;
use Session;

class TrainingMaterialController extends Controller
{
    private $categories, $training,$trainings;

    public function index($id)

    {
        return view('teacher.training.material.index',['id' => $id]);
    }

    public function create(Request $request, $id)
    {
        TrainingsMaterial::NewTrainingMaterial($request, $id);
        return back()->with('message','Training Info Created Successfully');
    }

//    public function manage()
//    {   $this->trainings = Training::where('teacher_id',Session::get('teacher_id'))->get();
//        return view('teacher.training.manage',['trainings'=>$this->trainings]);
//    }
//    public function detail($id)
//    {
//        $this->training = Training::find($id);
//        return view('teacher.training.detail',['training'=>$this->training]);
//    }
//    public function edit($id)
//    {
//        $this->categories = Category::all();
//        $this->training = Training::find($id);
//        return view('teacher.training.edit', ['training' => $this->training, 'categories' => $this->categories]);
//    }
//    public function update(Request $request, $id)
//    {
//        if ($request->file('image'))
//        {
//            $this->validate($request, [
//                'image' => 'image'
//            ]);
//        }
//        Training::updateTraining($request, $id);
//        return redirect('/training/manage')->with('message', 'Training Module Updated Successfully');
//    }
//
//    public function delete($id)
//    {
//        Training::deleteTraining($id);
//        return back()->with('message', 'Training Module Deleted Successfully');
//    }
}
