<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Session;

class CourseController extends Controller
{
    private $categories, $training,$trainings;

    public function index()

    {
        $this->categories = Category::all();
        return view('teacher.training.index',['categories' => $this->categories]);
    }

    public function create(Request $request)
    {
        Course::NewTraining($request);
        return back()->with('message','Course Info Created Successfully');
    }

    public function manage()
    {   $this->trainings = Course::where('teacher_id',Session::get('teacher_id'))->get();
        return view('teacher.training.manage',['trainings'=>$this->trainings]);
    }
    public function detail($id)
    {
        $this->training = Course::find($id);
        return view('teacher.training.detail',['training'=>$this->training]);
    }
    public function edit($id)
    {
        $this->categories = Category::all();
        $this->training = Course::find($id);
        return view('teacher.training.edit', ['training' => $this->training, 'categories' => $this->categories]);
    }
    public function update(Request $request, $id)
    {
        if ($request->file('image'))
        {
            $this->validate($request, [
                'image' => 'image'
            ]);
        }
        Course::updateTraining($request, $id);
        return redirect('/training/manage')->with('message', 'Course Module Updated Successfully');
    }

    public function delete($id)
    {
        Course::deleteTraining($id);
        return back()->with('message', 'Course Module Deleted Successfully');
    }
}
