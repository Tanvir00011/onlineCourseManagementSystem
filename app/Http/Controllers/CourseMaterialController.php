<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CourseMaterial;
use Illuminate\Http\Request;
use Session;

class CourseMaterialController extends Controller
{
    private $categories, $training,$courses;

    public function index($id)

    {
        return view('teacher.training.material.index',['id' => $id]);
    }

    public function create(Request $request, $id)
    {
        CourseMaterial::NewTrainingMaterial($request, $id);
        return back()->with('message','Course Info Created Successfully');
    }

//    public function manage()
//    {   $this->courses = Course::where('teacher_id',Session::get('teacher_id'))->get();
//        return view('teacher.training.manage',['courses'=>$this->courses]);
//    }
//    public function detail($id)
//    {
//        $this->training = Course::find($id);
//        return view('teacher.training.detail',['training'=>$this->training]);
//    }
//    public function edit($id)
//    {
//        $this->categories = Category::all();
//        $this->training = Course::find($id);
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
//        Course::updateTraining($request, $id);
//        return redirect('/training/manage')->with('message', 'Course Module Updated Successfully');
//    }
//
//    public function delete($id)
//    {
//        Course::deleteTraining($id);
//        return back()->with('message', 'Course Module Deleted Successfully');
//    }
}
